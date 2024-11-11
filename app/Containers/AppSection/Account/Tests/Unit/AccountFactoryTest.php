<?php

namespace App\Containers\AppSection\Account\Tests\Unit;

use App\Containers\AppSection\Account\Data\Factories\AccountFactory;
use App\Containers\AppSection\Account\Models\Account;
use App\Containers\AppSection\Account\Tests\UnitTestCase;

/**
 * @group account
 * @group unit
 */
class AccountFactoryTest extends UnitTestCase
{
    public function testCreateAccount(): void
    {
        $account = AccountFactory::new()->make();

        $this->assertInstanceOf(Account::class, $account);
    }
}
