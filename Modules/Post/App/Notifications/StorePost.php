<?php

namespace Modules\Post\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class StorePost extends Notification
{
    use Queueable;

    public $description;
    public $title;
    public $url;

    public function __construct($title , $body , $url)
    {
        $this->title = $title;
        $this->description = $body;
        $this->url = $url;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['database'];
    }


    public function toArray($notifiable): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'url' => route($this->url),
        ];
    }
}
