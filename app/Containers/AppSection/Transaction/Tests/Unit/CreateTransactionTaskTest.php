<?php

namespace App\Containers\AppSection\Transaction\Tests\Unit;

use App\Containers\AppSection\Transaction\Events\TransactionCreatedEvent;
use App\Containers\AppSection\Transaction\Tasks\CreateTransactionTask;
use App\Containers\AppSection\Transaction\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * @group transaction
 * @group unit
 */
class CreateTransactionTaskTest extends UnitTestCase
{
    public function testCreateTransaction(): void
    {
        Event::fake();
        $data = [];

        $transaction = app(CreateTransactionTask::class)->run($data);

        $this->assertModelExists($transaction);
        Event::assertDispatched(TransactionCreatedEvent::class);
    }

    // TODO TEST
    // public function testCreateTransactionWithInvalidData(): void
    // {
    //     $this->expectException(CreateResourceFailedException::class);
    //
    //     $data = [
    //         // put some invalid data here
    //         // 'invalid' => 'data',
    //     ];
    //
    //     app(CreateTransactionTask::class)->run($data);
    // }
}
