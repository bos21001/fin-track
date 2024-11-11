<?php

namespace App\Containers\AppSection\FinanceGroup\Events;

use App\Containers\AppSection\FinanceGroup\Models\FinanceGroup;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class FinanceGroupFoundByIdEvent extends ParentEvent
{
    public function __construct(
        public readonly FinanceGroup $financegroup,
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
