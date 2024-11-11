<?php

namespace App\Containers\AppSection\Transaction\Tests\Unit;

use App\Containers\AppSection\Transaction\Data\Factories\TransactionFactory;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Containers\AppSection\Transaction\Tests\UnitTestCase;

/**
 * @group transaction
 * @group unit
 */
class TransactionFactoryTest extends UnitTestCase
{
    public function testCreateTransaction(): void
    {
        $transaction = TransactionFactory::new()->make();

        $this->assertInstanceOf(Transaction::class, $transaction);
    }
}
