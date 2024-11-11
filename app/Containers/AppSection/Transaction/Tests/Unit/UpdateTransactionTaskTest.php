<?php

namespace App\Containers\AppSection\Transaction\Tests\Unit;

use App\Containers\AppSection\Transaction\Data\Factories\TransactionFactory;
use App\Containers\AppSection\Transaction\Events\TransactionUpdatedEvent;
use App\Containers\AppSection\Transaction\Tasks\UpdateTransactionTask;
use App\Containers\AppSection\Transaction\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * @group transaction
 * @group unit
 */
class UpdateTransactionTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateTransaction(): void
    {
        Event::fake();
        $transaction = TransactionFactory::new()->createOne();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedTransaction = app(UpdateTransactionTask::class)->run($data, $transaction->id);

        $this->assertEquals($transaction->id, $updatedTransaction->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedTransaction->some_field);
        Event::assertDispatched(TransactionUpdatedEvent::class);
    }

    public function testUpdateTransactionWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateTransactionTask::class)->run([], $noneExistingId);
    }
}
