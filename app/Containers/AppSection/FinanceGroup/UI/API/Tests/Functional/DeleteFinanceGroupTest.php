<?php

namespace App\Containers\AppSection\FinanceGroup\UI\API\Tests\Functional;

use App\Containers\AppSection\FinanceGroup\Data\Factories\FinanceGroupFactory;
use App\Containers\AppSection\FinanceGroup\Models\FinanceGroup;
use App\Containers\AppSection\FinanceGroup\UI\API\Tests\ApiTestCase;

/**
 * @group financegroup
 * @group api
 */
class DeleteFinanceGroupTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/finance-groups/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingFinanceGroup(): void
    {
        $financeGroup = FinanceGroupFactory::new()->createOne();

        $response = $this->injectId($financeGroup->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingFinanceGroup(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testGivenHaveNoAccess_CannotDeleteFinanceGroup(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     $financeGroup = FinanceGroupFactory::new()->createOne();
    //
    //     $response = $this->injectId($financeGroup->id)->makeCall();
    //
    //     $response->assertStatus(403);
    // }
}
