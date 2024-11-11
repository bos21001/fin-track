<?php

namespace App\Containers\AppSection\FinanceGroup\Tests\Unit;

use App\Containers\AppSection\FinanceGroup\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * @group financegroup
 * @group unit
 */
class FinanceGroupsMigrationTest extends UnitTestCase
{
    public function test_finance_groups_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('finance_groups', $column));
        }
    }
}
