<?php

namespace App\Containers\AppSection\Transaction\Listeners;

use App\Containers\AppSection\Transaction\Events\TransactionDeletedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class TransactionDeletedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(TransactionDeletedEvent $event): void
    {
    }
}
