<?php

namespace App\Containers\AppSection\FinanceGroup\UI\API\Tests\Functional;

use App\Containers\AppSection\FinanceGroup\Data\Factories\FinanceGroupFactory;
use App\Containers\AppSection\FinanceGroup\Models\FinanceGroup;
use App\Containers\AppSection\FinanceGroup\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * @group financegroup
 * @group api
 */
class ListFinanceGroupsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/finance-groups';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testListFinanceGroupsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        FinanceGroupFactory::new()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testListFinanceGroupsByNonAdmin(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     FinanceGroupFactory::new()->count(2)->create();
    //
    //     $response = $this->makeCall();
    //
    //     $response->assertStatus(403);
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('message')
    //                 ->where('message', 'This action is unauthorized.')
    //                 ->etc()
    //     );
    // }

    // TODO TEST
    // public function testSearchFinanceGroupsByFields(): void
    // {
    //     FinanceGroupFactory::new()->count(3)->create();
    //     // create a model with specific field values
    //     $financeGroup = FinanceGroupFactory::new()->create([
    //         // 'name' => 'something',
    //     ]);
    //
    //     // search by the above values
    //     $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($financeGroup->name))->makeCall();
    //
    //     $response->assertStatus(200);
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('data')
    //                 // ->where('data.0.name', $financeGroup->name)
    //                 ->etc()
    //     );
    // }

    public function testSearchFinanceGroupsByHashID(): void
    {
        $financegroups = FinanceGroupFactory::new()->count(3)->create();
        $secondFinanceGroup = $financegroups[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondFinanceGroup->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondFinanceGroup->getHashedKey())
                    ->etc()
        );
    }
}
