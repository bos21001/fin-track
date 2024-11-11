<?php

namespace App\Containers\AppSection\Transaction\Listeners;

use App\Containers\AppSection\Transaction\Events\TransactionUpdatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class TransactionUpdatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(TransactionUpdatedEvent $event): void
    {
    }
}
