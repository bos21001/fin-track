<?php

namespace App\Containers\AppSection\FinanceGroup\Tests\Unit;

use App\Containers\AppSection\FinanceGroup\Data\Factories\FinanceGroupFactory;
use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupsListedEvent;
use App\Containers\AppSection\FinanceGroup\Tasks\ListFinanceGroupsTask;
use App\Containers\AppSection\FinanceGroup\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;

/**
 * @group financegroup
 * @group unit
 */
class ListFinanceGroupsTaskTest extends UnitTestCase
{
    public function testListFinanceGroups(): void
    {
        Event::fake();
        FinanceGroupFactory::new()->count(3)->create();

        $foundFinanceGroups = app(ListFinanceGroupsTask::class)->run();

        $this->assertCount(3, $foundFinanceGroups);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundFinanceGroups);
        Event::assertDispatched(FinanceGroupsListedEvent::class);
    }
}
