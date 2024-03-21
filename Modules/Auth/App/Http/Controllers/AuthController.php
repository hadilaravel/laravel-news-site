<?php

namespace Modules\Auth\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\Message\Email\EmailService;
use App\Http\Services\Message\MessageService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Auth\App\Http\Requests\ConfirmFormRequest;
use Modules\Auth\App\Http\Requests\LoginRequest;
use Modules\Auth\App\Http\Requests\RegisterRequest;
use Modules\Auth\App\Jobs\SendEmail;
use Modules\Otp\App\Models\Otp;
//use Modules\User\App\Models\User;
use App\Models\User;
class AuthController extends Controller
{

  public function registerView()
  {
      return view('auth::register');
  }

  public function registerStore(RegisterRequest $request)
  {
      $inputs =  $request->all();
      $inputs['password'] = bcrypt($request->password);
      $user = User::create($inputs);

      $otpCode = rand(111111, 999999);
      $token = Str::random(60);
      $otpInputs = [
          'token' => $token,
          'user_id' => $user->id,
          'otp_code' => $otpCode,
          'login_id' => $inputs['email'],
      ];
      $otp =  Otp::create($otpInputs);
//      send email
      SendEmail::dispatch($inputs['email'] , $otpCode);

      return to_route('auth.confirm-form' , $token);
  }

  public function confirmForm($token)
  {
      $otp = Otp::where('token' , $token)->first();
      if(empty($otp))
      {
          return to_route('auth.register')->withErrors(['errorAddress' => 'آدرس وارد شده نامعتبر می باشد']);
      }
      $email = $otp->user->email;
      return view('auth::confirm-form' , compact('email' , 'token'));
  }

  public function confirmFormStore(ConfirmFormRequest $request , $token)
  {
      $inputs = $request->all();
      $otp = Otp::where('token' , $token)->where('used' , 0)->first();
      if(empty($otp)){
          return to_route('auth.register')->withErrors(['otp_code' => 'آدرس وارد شده نامعتبر است']);
      }

      if($otp->otp_code !== $inputs['otp_code']){
          return to_route('auth.confirm-form' , $token)->withErrors(['otp_code' => 'کد وارد شده نامعتبر است']);
      }

      $otp->update(['used' => 1]);
      $user = $otp->user()->first();
      $user->update(['email_verified_at' => Carbon::now()]);
      Auth::loginUsingId($user->id);
      return to_route('home.index');
  }

  public function sendEmail($token)
  {
      $otpCode = rand(111111, 999999);
      $otp = Otp::where('token' , $token)->first();
      if(empty($otp))
      {
          return to_route('auth.register')->withErrors(['errorAddress' => 'آدرس وارد شده نامعتبر می باشد']);
      }
      $otp->update([
         'otp_code' => $otpCode,
      ]);
      $email = $otp->user->email;

      SendEmail::dispatch($email , $otpCode);

      return to_route('auth.confirm-form' , $token);
  }

  public function loginView()
  {
      return view('auth::login');
  }

  public function loginStore(LoginRequest $request)
  {
      if(Auth::attempt(['email' => $request->email , 'password' => $request->password])){
          return to_route('home.index');
      }
      return to_route('auth.login')->withErrors(['error_valid' => 'پست الکترونیکی یا پسورد وارد شده اشتباه می باشد' ]);
  }

  public function logout()
  {
      Auth::logout();
      return to_route('home.index');
  }

  public function sendEmailPasswordView()
  {
      return view('auth::email-password');
  }

  public function sendEmailPasswordStore(Request $request)
  {
      $request->validate([
          'email' => 'required|email|exists:users'
      ]);
      $user = User::where('email' , $request->email)->first();
      if(empty($user)){
          return to_route('auth.send-email-password')->withErrors(['email' => 'ایمیل وجود ندارد']);
      }
      $token = Str::random(60);
      if($user->token_confirm_password !== null){
          $user->token_confirm_password = null;
          $user->save();
      }
      $user->update([
         'token_confirm_password' => $token,
      ]);
      $emailService = new EmailService();
//      $route = "<a href='http://localhost:8000/auth/password-recovery/{$token}'>برای تغیر پسورد کلیک </a>";
      $link =  route('auth.password-recovery' , $token);
      $route = "<a href='{$link}'> برای تغیر پسورد کلیک </a>";
//      dd($route);
      $details = [
          'title' => ' بازیابی ایمیل',
          'body' => "{$route}"
      ];
      $emailService->setDetails($details);
      $emailService->setFrom('noreply@example.com' , 'سایت خبری' );
      $emailService->setSubject('  بازیابی ایمیل');
      $emailService->setTo($request->email);

      $messageService = new MessageService($emailService);
      $messageService->send();

      return  to_route('auth.send-email-password')->with('success-send-email' , 'ایمیل با موفقیت ارسال شد');

  }

  public function passwordRecovery($token)
  {
      $user = User::where('token_confirm_password' , $token)->first();
      if(empty($user)){
          return to_route('home.index');
      }
      return view('auth::password-recovery' , compact('token'));
  }

  public function passwordRecoveryStore( Request $request , $token)
  {
      $request->validate([
          'password' => 'required|min:6|max:255',
      ]);
      $user = User::where('token_confirm_password' , $token)->first();
      if(empty($user)){
          return to_route('home.index');
      }
      $password = bcrypt($request->password);
      $user->update([
          'password' => $password,
      ]);
      return back()->with('success-password-recovery' , 'پسورد با موفقیت تغیر یافت');
  }

}
