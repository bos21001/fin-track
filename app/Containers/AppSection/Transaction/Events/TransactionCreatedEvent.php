<?php

namespace App\Containers\AppSection\Transaction\Events;

use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class TransactionCreatedEvent extends ParentEvent
{
    public function __construct(
        public readonly Transaction $transaction,
    ) {
    }

    /**
     * @return Channel[]
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
