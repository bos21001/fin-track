<?php

namespace App\Containers\AppSection\Account\Tests\Unit;

use App\Containers\AppSection\Account\Data\Factories\AccountFactory;
use App\Containers\AppSection\Account\Events\AccountDeletedEvent;
use App\Containers\AppSection\Account\Tasks\DeleteAccountTask;
use App\Containers\AppSection\Account\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * @group account
 * @group unit
 */
class DeleteAccountTaskTest extends UnitTestCase
{
    public function testDeleteAccount(): void
    {
        Event::fake();
        $account = AccountFactory::new()->createOne();

        $result = app(DeleteAccountTask::class)->run($account->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(AccountDeletedEvent::class);
    }

    public function testDeleteAccountWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteAccountTask::class)->run($noneExistingId);
    }
}
