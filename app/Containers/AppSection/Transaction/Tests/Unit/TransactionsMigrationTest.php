<?php

namespace App\Containers\AppSection\Transaction\Tests\Unit;

use App\Containers\AppSection\Transaction\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * @group transaction
 * @group unit
 */
class TransactionsMigrationTest extends UnitTestCase
{
    public function test_transactions_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('transactions', $column));
        }
    }
}
