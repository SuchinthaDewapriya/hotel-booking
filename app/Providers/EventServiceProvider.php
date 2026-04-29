<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
=======
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422

class EventServiceProvider extends ServiceProvider
{
    /**
<<<<<<< HEAD
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
=======
     * The event listener mappings for the application.
     *
     * @var array
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
<<<<<<< HEAD
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
=======
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
>>>>>>> 70d25f10a8f36bf7f459c5563f6fe29082f7d422
}
