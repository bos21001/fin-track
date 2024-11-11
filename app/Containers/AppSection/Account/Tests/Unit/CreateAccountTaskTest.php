<?php

namespace App\Containers\AppSection\Account\Tests\Unit;

use App\Containers\AppSection\Account\Events\AccountCreatedEvent;
use App\Containers\AppSection\Account\Tasks\CreateAccountTask;
use App\Containers\AppSection\Account\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * @group account
 * @group unit
 */
class CreateAccountTaskTest extends UnitTestCase
{
    public function testCreateAccount(): void
    {
        Event::fake();
        $data = [];

        $account = app(CreateAccountTask::class)->run($data);

        $this->assertModelExists($account);
        Event::assertDispatched(AccountCreatedEvent::class);
    }

    // TODO TEST
    // public function testCreateAccountWithInvalidData(): void
    // {
    //     $this->expectException(CreateResourceFailedException::class);
    //
    //     $data = [
    //         // put some invalid data here
    //         // 'invalid' => 'data',
    //     ];
    //
    //     app(CreateAccountTask::class)->run($data);
    // }
}
