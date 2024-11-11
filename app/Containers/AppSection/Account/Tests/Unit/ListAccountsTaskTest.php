<?php

namespace App\Containers\AppSection\Account\Tests\Unit;

use App\Containers\AppSection\Account\Data\Factories\AccountFactory;
use App\Containers\AppSection\Account\Events\AccountsListedEvent;
use App\Containers\AppSection\Account\Tasks\ListAccountsTask;
use App\Containers\AppSection\Account\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * @group account
 * @group unit
 */
class ListAccountsTaskTest extends UnitTestCase
{
    public function testListAccounts(): void
    {
        Event::fake();
        AccountFactory::new()->count(3)->create();

        $foundAccounts = app(ListAccountsTask::class)->run();

        $this->assertCount(3, $foundAccounts);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundAccounts);
        Event::assertDispatched(AccountsListedEvent::class);
    }
}
