<?php

namespace App\Containers\AppSection\FinanceGroup\Tests\Unit;

use App\Containers\AppSection\FinanceGroup\Data\Factories\FinanceGroupFactory;
use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupUpdatedEvent;
use App\Containers\AppSection\FinanceGroup\Tasks\UpdateFinanceGroupTask;
use App\Containers\AppSection\FinanceGroup\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * @group financegroup
 * @group unit
 */
class UpdateFinanceGroupTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateFinanceGroup(): void
    {
        Event::fake();
        $financeGroup = FinanceGroupFactory::new()->createOne();
        $data = [
            // add some fillable fields here
            // 'some_field' => 'new_field_data',
        ];

        $updatedFinanceGroup = app(UpdateFinanceGroupTask::class)->run($data, $financeGroup->id);

        $this->assertEquals($financeGroup->id, $updatedFinanceGroup->id);
        // assert if fields are updated
        // $this->assertEquals($data['some_field'], $updatedFinanceGroup->some_field);
        Event::assertDispatched(FinanceGroupUpdatedEvent::class);
    }

    public function testUpdateFinanceGroupWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(UpdateFinanceGroupTask::class)->run([], $noneExistingId);
    }
}
