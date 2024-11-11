<?php

namespace App\Containers\AppSection\FinanceGroup\Tests\Unit;

use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupCreatedEvent;
use App\Containers\AppSection\FinanceGroup\Tasks\CreateFinanceGroupTask;
use App\Containers\AppSection\FinanceGroup\Tests\UnitTestCase;
use App\Ship\Exceptions\CreateResourceFailedException;
use Illuminate\Support\Facades\Event;

/**
 * @group financegroup
 * @group unit
 */
class CreateFinanceGroupTaskTest extends UnitTestCase
{
    public function testCreateFinanceGroup(): void
    {
        Event::fake();
        $data = [];

        $financeGroup = app(CreateFinanceGroupTask::class)->run($data);

        $this->assertModelExists($financeGroup);
        Event::assertDispatched(FinanceGroupCreatedEvent::class);
    }

    // TODO TEST
    // public function testCreateFinanceGroupWithInvalidData(): void
    // {
    //     $this->expectException(CreateResourceFailedException::class);
    //
    //     $data = [
    //         // put some invalid data here
    //         // 'invalid' => 'data',
    //     ];
    //
    //     app(CreateFinanceGroupTask::class)->run($data);
    // }
}
