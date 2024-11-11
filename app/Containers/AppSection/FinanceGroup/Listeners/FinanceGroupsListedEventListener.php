<?php

namespace App\Containers\AppSection\FinanceGroup\Listeners;

use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupsListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinanceGroupsListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(FinanceGroupsListedEvent $event): void
    {
    }
}
