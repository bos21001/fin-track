<?php

namespace App\Containers\AppSection\Account\Listeners;

use App\Containers\AppSection\Account\Events\AccountUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(AccountUpdatedEvent $event): void
    {
    }
}
