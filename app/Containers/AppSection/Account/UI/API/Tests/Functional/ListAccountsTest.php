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
class ListAccountsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/accounts';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testListAccountsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        AccountFactory::new()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testListAccountsByNonAdmin(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     AccountFactory::new()->count(2)->create();
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
    // public function testSearchAccountsByFields(): void
    // {
    //     AccountFactory::new()->count(3)->create();
    //     // create a model with specific field values
    //     $account = AccountFactory::new()->create([
    //         // 'name' => 'something',
    //     ]);
    //
    //     // search by the above values
    //     $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($account->name))->makeCall();
    //
    //     $response->assertStatus(200);
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('data')
    //                 // ->where('data.0.name', $account->name)
    //                 ->etc()
    //     );
    // }

    public function testSearchAccountsByHashID(): void
    {
        $accounts = AccountFactory::new()->count(3)->create();
        $secondAccount = $accounts[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondAccount->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondAccount->getHashedKey())
                    ->etc()
        );
    }
}
