<?php

namespace App\Containers\AppSection\Account\Listeners;

use App\Containers\AppSection\Account\Events\AccountFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(AccountFoundByIdEvent $event): void
    {
    }
}
