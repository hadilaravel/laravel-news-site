<?php

namespace Modules\User\App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\User\App\Events\SendEmailToUserEvent;
use Modules\User\App\Listeners\SendEmailToUserListener;
use Modules\User\App\Listeners\SendSmsToUserListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */

    protected  $listen = [
        SendEmailToUserEvent::class => [
            SendEmailToUserListener::class,
            SendSmsToUserListener::class,
        ],
    ];

    public function register(): void
    {
        //
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }



}
