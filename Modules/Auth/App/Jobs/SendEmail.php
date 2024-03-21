<?php

namespace Modules\Auth\App\Jobs;

use App\Http\Services\Message\Email\EmailService;
use App\Http\Services\Message\MessageService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

   public $email;
   public $otpCode;

    public function __construct($email , $otpCode)
    {
        $this->email = $email;
        $this->otpCode = $otpCode;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $emailService = new EmailService();
        $details = [
            'title' => 'ایمیل فعال سازی',
            'body' => " کد فعال سازی شما :$this->otpCode "
        ];
        $emailService->setDetails($details);
        $emailService->setFrom('noreply@example.com' , 'سایت خبری' );
        $emailService->setSubject('کد احراز هویت');
        $emailService->setTo($this->email);

        $messageService = new MessageService($emailService);
        $messageService->send();
    }
}
