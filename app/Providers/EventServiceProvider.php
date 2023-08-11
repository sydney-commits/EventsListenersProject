<?php

namespace App\Providers;

use App\Listeners\WelcomeEmailListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\OrderPlacedListener;
use App\Events\OrderPlaced;
use App\Listeners\OrderDDlisterner;
use App\Listeners\OrderPlacedPDF;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            WelcomeEmailListener::class,
        ],

        OrderPlaced::class => [
            OrderPlacedListener::class,
            OrderPlacedPDF::class,
            OrderDDlisterner::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
