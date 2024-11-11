<?php

namespace App\Containers\AppSection\FinanceGroup\Listeners;

use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinanceGroupFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(FinanceGroupFoundByIdEvent $event): void
    {
    }
}
