<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->prefix('auth')->group(function (){
//register
    Route::get('register' , [AuthController::class , 'registerView'])->name('auth.register');
    Route::middleware('throttle:5,1')->post('register' , [AuthController::class , 'registerStore'])->name('auth.register.store');

//    confirm email
    Route::get('confirm-form/{token}' , [AuthController::class , 'confirmForm' ])->name('auth.confirm-form');
    Route::post('confirm-form/{token}' , [AuthController::class , 'confirmFormStore' ])->name('auth.confirm-form.store');

//    send again email
    Route::middleware('throttle:2,1')->get('send-email/{token}' , [AuthController::class , 'sendEmail'])->name('auth.send-email');

//login
    Route::get('login' , [AuthController::class , 'loginView'])->name('auth.login');
    Route::post('login' , [AuthController::class , 'loginStore'])->name('auth.login.store');

//   password recovery
    Route::get('send-email-password' , [AuthController::class , 'sendEmailPasswordView'])->name('auth.send-email-password');
    Route::middleware('throttle:3,1')->post('send-email-password' , [AuthController::class , 'sendEmailPasswordStore'])->name('auth.send-email-password-store');

    Route::get('password-recovery/{token}' , [AuthController::class , 'passwordRecovery'])->name('auth.password-recovery');
    Route::post('password-recovery/{token}' , [AuthController::class , 'passwordRecoveryStore'])->name('auth.password-recovery-store');

});
//    logout
Route::middleware('auth')->get('logout' , [AuthController::class , 'logout'])->name('auth.logout');
