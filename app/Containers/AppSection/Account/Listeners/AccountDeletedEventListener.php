<?php

namespace App\Containers\AppSection\Account\Listeners;

use App\Containers\AppSection\Account\Events\AccountDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(AccountDeletedEvent $event): void
    {
    }
}
