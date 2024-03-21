<?php

namespace Modules\User\App\Listeners;

use App\Http\Services\Message\Email\EmailService;
use App\Http\Services\Message\MessageService;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendEmailToUserListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle($event): void
    {
        $emailService = new EmailService();
        $details = [
            'title' => 'ایمیل فعال سازی',
            'body' => " کد فعال سازی شما : "
        ];
        $emailService->setDetails($details);
        $emailService->setFrom('noreply@example.com' , 'سایت خبری' );
        $emailService->setSubject('کد احراز هویت');
        $emailService->setTo($event->email);

        $messageService = new MessageService($emailService);
        $messageService->send();
    }
}
