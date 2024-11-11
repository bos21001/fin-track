<?php

namespace App\Containers\AppSection\Account\Tests\Unit;

use App\Containers\AppSection\Account\Data\Factories\AccountFactory;
use App\Containers\AppSection\Account\Events\AccountFoundByIdEvent;
use App\Containers\AppSection\Account\Tasks\FindAccountByIdTask;
use App\Containers\AppSection\Account\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * @group account
 * @group unit
 */
class FindAccountByIdTaskTest extends UnitTestCase
{
    public function testFindAccountById(): void
    {
        Event::fake();
        $account = AccountFactory::new()->createOne();

        $foundAccount = app(FindAccountByIdTask::class)->run($account->id);

        $this->assertEquals($account->id, $foundAccount->id);
        Event::assertDispatched(AccountFoundByIdEvent::class);
    }

    public function testFindAccountWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindAccountByIdTask::class)->run($noneExistingId);
    }
}
