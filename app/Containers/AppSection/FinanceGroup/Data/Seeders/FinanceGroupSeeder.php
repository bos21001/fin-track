<?php

namespace App\Containers\AppSection\FinanceGroup\Data\Seeders;

use App\Containers\AppSection\FinanceGroup\Models\FinanceGroup;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class FinanceGroupSeeder extends ParentSeeder
{
    public function run(): void
    {
        // Create a finance group with accounts and transactions
        $financeGroup = FinanceGroup::create(['name' => 'Personal Finance', 'user_id' => 1]);

        $account = $financeGroup->accounts()->create(['name' => 'Savings', 'type' => 'savings', 'balance' => 0]);

        $account->transactions()->createMany([
            ['amount' => 500, 'type' => 'income', 'date' => now(), 'description' => 'Salary'],
            ['amount' => -200, 'type' => 'expense', 'date' => now(), 'description' => 'Groceries'],
        ]);
    }
}
