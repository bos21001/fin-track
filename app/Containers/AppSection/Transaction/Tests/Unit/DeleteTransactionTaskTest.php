<?php

namespace App\Containers\AppSection\Transaction\Tests\Unit;

use App\Containers\AppSection\Transaction\Data\Factories\TransactionFactory;
use App\Containers\AppSection\Transaction\Events\TransactionDeletedEvent;
use App\Containers\AppSection\Transaction\Tasks\DeleteTransactionTask;
use App\Containers\AppSection\Transaction\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * @group transaction
 * @group unit
 */
class DeleteTransactionTaskTest extends UnitTestCase
{
    public function testDeleteTransaction(): void
    {
        Event::fake();
        $transaction = TransactionFactory::new()->createOne();

        $result = app(DeleteTransactionTask::class)->run($transaction->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(TransactionDeletedEvent::class);
    }

    public function testDeleteTransactionWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteTransactionTask::class)->run($noneExistingId);
    }
}
