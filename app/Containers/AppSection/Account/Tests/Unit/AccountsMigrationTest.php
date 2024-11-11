<?php

namespace App\Containers\AppSection\Account\Tests\Unit;

use App\Containers\AppSection\Account\Tests\UnitTestCase;
use Illuminate\Support\Facades\Schema;

/**
 * @group account
 * @group unit
 */
class AccountsMigrationTest extends UnitTestCase
{
    public function test_accounts_table_has_expected_columns(): void
    {
        $columns = [
            'id',
            // add your migration columns
            'created_at',
            'updated_at',
        ];

        foreach ($columns as $column) {
            $this->assertTrue(Schema::hasColumn('accounts', $column));
        }
    }
}
