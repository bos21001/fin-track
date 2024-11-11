<?php

namespace App\Containers\AppSection\Account\UI\API\Tests\Functional;

use App\Containers\AppSection\Account\Data\Factories\AccountFactory;
use App\Containers\AppSection\Account\Models\Account;
use App\Containers\AppSection\Account\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * @group account
 * @group api
 */
class FindAccountByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/accounts/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindAccount(): void
    {
        $account = AccountFactory::new()->createOne();

        $response = $this->injectId($account->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $this->encode($account->id))
                    ->etc()
        );
    }

    public function testFindNonExistingAccount(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredAccountResponse(): void
    {
        $account = AccountFactory::new()->createOne();

        $response = $this->injectId($account->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $account->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
    // public function testFindAccountWithRelation(): void
    // {
    //     $account = AccountFactory::new()->createOne();
    //     $relation = 'roles';
    //
    //     $response = $this->injectId($account->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
    //
    //     $response->assertStatus(200);
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //           $json->has('data')
    //               ->where('data.id', $account->getHashedKey())
    //               ->count("data.$relation.data", 1)
    //               ->where("data.$relation.data.0.name", 'something')
    //               ->etc()
    //     );
    // }
}
