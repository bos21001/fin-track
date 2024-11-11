<?php

namespace App\Containers\AppSection\Transaction\Tests\Unit;

use App\Containers\AppSection\Transaction\Data\Factories\TransactionFactory;
use App\Containers\AppSection\Transaction\Events\TransactionsListedEvent;
use App\Containers\AppSection\Transaction\Tasks\ListTransactionsTask;
use App\Containers\AppSection\Transaction\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * @group transaction
 * @group unit
 */
class ListTransactionsTaskTest extends UnitTestCase
{
    public function testListTransactions(): void
    {
        Event::fake();
        TransactionFactory::new()->count(3)->create();

        $foundTransactions = app(ListTransactionsTask::class)->run();

        $this->assertCount(3, $foundTransactions);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundTransactions);
        Event::assertDispatched(TransactionsListedEvent::class);
    }
}
