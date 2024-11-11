<?php

namespace App\Containers\AppSection\FinanceGroup\Listeners;

use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinanceGroupUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(FinanceGroupUpdatedEvent $event): void
    {
    }
}
