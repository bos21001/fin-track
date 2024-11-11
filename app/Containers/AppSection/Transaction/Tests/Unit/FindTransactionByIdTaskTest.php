<?php

namespace App\Containers\AppSection\Transaction\Tests\Unit;

use App\Containers\AppSection\Transaction\Data\Factories\TransactionFactory;
use App\Containers\AppSection\Transaction\Events\TransactionFoundByIdEvent;
use App\Containers\AppSection\Transaction\Tasks\FindTransactionByIdTask;
use App\Containers\AppSection\Transaction\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * @group transaction
 * @group unit
 */
class FindTransactionByIdTaskTest extends UnitTestCase
{
    public function testFindTransactionById(): void
    {
        Event::fake();
        $transaction = TransactionFactory::new()->createOne();

        $foundTransaction = app(FindTransactionByIdTask::class)->run($transaction->id);

        $this->assertEquals($transaction->id, $foundTransaction->id);
        Event::assertDispatched(TransactionFoundByIdEvent::class);
    }

    public function testFindTransactionWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindTransactionByIdTask::class)->run($noneExistingId);
    }
}
