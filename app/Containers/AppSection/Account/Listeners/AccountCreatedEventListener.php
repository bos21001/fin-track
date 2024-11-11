<?php

namespace App\Containers\AppSection\Account\Listeners;

use App\Containers\AppSection\Account\Events\AccountCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(AccountCreatedEvent $event): void
    {
    }
}
