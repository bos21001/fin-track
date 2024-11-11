<?php

namespace App\Containers\AppSection\FinanceGroup\Listeners;

use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinanceGroupCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(FinanceGroupCreatedEvent $event): void
    {
    }
}
