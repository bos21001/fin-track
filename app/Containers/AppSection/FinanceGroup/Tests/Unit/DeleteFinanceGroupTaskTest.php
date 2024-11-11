<?php

namespace App\Containers\AppSection\FinanceGroup\Tests\Unit;

use App\Containers\AppSection\FinanceGroup\Data\Factories\FinanceGroupFactory;
use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupDeletedEvent;
use App\Containers\AppSection\FinanceGroup\Tasks\DeleteFinanceGroupTask;
use App\Containers\AppSection\FinanceGroup\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * @group financegroup
 * @group unit
 */
class DeleteFinanceGroupTaskTest extends UnitTestCase
{
    public function testDeleteFinanceGroup(): void
    {
        Event::fake();
        $financeGroup = FinanceGroupFactory::new()->createOne();

        $result = app(DeleteFinanceGroupTask::class)->run($financeGroup->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(FinanceGroupDeletedEvent::class);
    }

    public function testDeleteFinanceGroupWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(DeleteFinanceGroupTask::class)->run($noneExistingId);
    }
}
