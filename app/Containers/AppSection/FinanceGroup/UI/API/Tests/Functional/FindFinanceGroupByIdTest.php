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
class FindFinanceGroupByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/finance-groups/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindFinanceGroup(): void
    {
        $financeGroup = FinanceGroupFactory::new()->createOne();

        $response = $this->injectId($financeGroup->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $this->encode($financeGroup->id))
                    ->etc()
        );
    }

    public function testFindNonExistingFinanceGroup(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredFinanceGroupResponse(): void
    {
        $financeGroup = FinanceGroupFactory::new()->createOne();

        $response = $this->injectId($financeGroup->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $financeGroup->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
    // public function testFindFinanceGroupWithRelation(): void
    // {
    //     $financeGroup = FinanceGroupFactory::new()->createOne();
    //     $relation = 'roles';
    //
    //     $response = $this->injectId($financeGroup->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
    //
    //     $response->assertStatus(200);
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //           $json->has('data')
    //               ->where('data.id', $financeGroup->getHashedKey())
    //               ->count("data.$relation.data", 1)
    //               ->where("data.$relation.data.0.name", 'something')
    //               ->etc()
    //     );
    // }
}
