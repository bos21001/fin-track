<?php

namespace App\Containers\AppSection\Account\Events;

use App\Containers\AppSection\Account\Models\Account;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class AccountCreatedEvent extends ParentEvent
{
    public function __construct(
        public readonly Account $account,
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
