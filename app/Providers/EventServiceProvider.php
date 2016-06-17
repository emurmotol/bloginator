<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
//    protected $listen = [
//        'App\Events\SomeEvent' => [
//            'App\Listeners\EventListener',
//        ],
//    ];

    protected $listen = [
        'Illuminate\Auth\Events\Login' => [
            'App\Events\Auth\UserEvent@onUserLogin',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'App\Events\Auth\UserEvent@onUserLogout',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }

}
