<?php

namespace Modules\User\App\Events;

use Illuminate\Queue\SerializesModels;

class SendEmailToUserEvent
{
    use SerializesModels;

   public $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Get the channels the event should be broadcast on.
     */
    public function broadcastOn(): array
    {
        return [];
    }
}
