<?php

namespace App\Containers\AppSection\Transaction\Listeners;

use App\Containers\AppSection\Transaction\Events\TransactionsListedEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class TransactionsListedEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(TransactionsListedEvent $event): void
    {
    }
}
