<?php

namespace App\Containers\AppSection\FinanceGroup\Listeners;

use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinanceGroupDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(FinanceGroupDeletedEvent $event): void
    {
    }
}
