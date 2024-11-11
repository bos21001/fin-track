<?php

namespace App\Containers\AppSection\Account\Listeners;

use App\Containers\AppSection\Account\Events\AccountsListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountsListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(AccountsListedEvent $event): void
    {
    }
}
