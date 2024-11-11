<?php

namespace App\Containers\AppSection\FinanceGroup\Tests\Unit;

use App\Containers\AppSection\FinanceGroup\Data\Factories\FinanceGroupFactory;
use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupFoundByIdEvent;
use App\Containers\AppSection\FinanceGroup\Tasks\FindFinanceGroupByIdTask;
use App\Containers\AppSection\FinanceGroup\Tests\UnitTestCase;
use App\Ship\Exceptions\NotFoundException;
use Illuminate\Support\Facades\Event;

/**
 * @group financegroup
 * @group unit
 */
class FindFinanceGroupByIdTaskTest extends UnitTestCase
{
    public function testFindFinanceGroupById(): void
    {
        Event::fake();
        $financeGroup = FinanceGroupFactory::new()->createOne();

        $foundFinanceGroup = app(FindFinanceGroupByIdTask::class)->run($financeGroup->id);

        $this->assertEquals($financeGroup->id, $foundFinanceGroup->id);
        Event::assertDispatched(FinanceGroupFoundByIdEvent::class);
    }

    public function testFindFinanceGroupWithInvalidId(): void
    {
        $this->expectException(NotFoundException::class);

        $noneExistingId = 777777;

        app(FindFinanceGroupByIdTask::class)->run($noneExistingId);
    }
}
