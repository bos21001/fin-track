<?php

namespace App\Containers\AppSection\FinanceGroup\Tests\Unit;

use App\Containers\AppSection\FinanceGroup\Data\Factories\FinanceGroupFactory;
use App\Containers\AppSection\FinanceGroup\Models\FinanceGroup;
use App\Containers\AppSection\FinanceGroup\Tests\UnitTestCase;

/**
 * @group financegroup
 * @group unit
 */
class FinanceGroupFactoryTest extends UnitTestCase
{
    public function testCreateFinanceGroup(): void
    {
        $financeGroup = FinanceGroupFactory::new()->make();

        $this->assertInstanceOf(FinanceGroup::class, $financeGroup);
    }
}
