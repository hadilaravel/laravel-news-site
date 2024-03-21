<?php

namespace Modules\Category\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CreatedCategory extends Notification
{
    use Queueable;


    public $title;
    public $description;
    public $url;

    public function __construct($title, $description = null, $url)
    {
        $this->title = $title;
        $this->description = $description;
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
