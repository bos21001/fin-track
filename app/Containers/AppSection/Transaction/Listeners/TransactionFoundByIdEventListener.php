<?php

namespace App\Containers\AppSection\Transaction\Listeners;

use App\Containers\AppSection\Transaction\Events\TransactionFoundByIdEvent;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class TransactionFoundByIdEventListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(TransactionFoundByIdEvent $event): void
    {
    }
}
