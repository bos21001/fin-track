<?php

namespace App\Containers\AppSection\Account\Providers;

use App\Ship\Parents\Providers\EventServiceProvider as ParentEventServiceProvider;

class EventServiceProvider extends ParentEventServiceProvider
{
    protected $listen = [
        // OrderShipped::class => [
        //     SendShipmentNotification::class,
        // ],
    ];
}