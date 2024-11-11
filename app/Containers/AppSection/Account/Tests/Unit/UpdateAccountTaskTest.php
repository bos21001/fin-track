<?php

namespace App\Containers\AppSection\Account\Tests\Unit;

use App\Containers\AppSection\Account\Data\Factories\AccountFactory;
use App\Containers\AppSection\Account\Events\AccountUpdatedEvent;
use App\Containers\AppSection\Account\Tasks\UpdateAccountTask;
use App\Containers\AppSection\Account\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * @group account
 * @group unit
 */
class UpdateAccountTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateAccount(): void
    {
        Event::fake();
        $account = AccountFactory::new()->createOne();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedAccount = app(UpdateAccountTask::class)->run($data, $account->id);

        $this->assertEquals($account->id, $updatedAccount->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedAccount->some_field);
        Event::assertDispatched(AccountUpdatedEvent::class);
    }

    public function testUpdateAccountWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateAccountTask::class)->run([], $noneExistingId);
    }
}
