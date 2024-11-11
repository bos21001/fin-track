<?php

namespace App\Containers\AppSection\Transaction\Listeners;

use App\Containers\AppSection\Transaction\Events\TransactionCreatedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class TransactionCreatedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(TransactionCreatedEvent $event): void
    {
    }
}
