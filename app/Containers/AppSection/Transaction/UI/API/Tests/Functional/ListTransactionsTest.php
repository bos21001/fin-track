<?php

namespace App\Containers\AppSection\Transaction\UI\API\Tests\Functional;

use App\Containers\AppSection\Transaction\Data\Factories\TransactionFactory;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Containers\AppSection\Transaction\UI\API\Tests\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;

/**
 * @group transaction
 * @group api
 */
class ListTransactionsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/transactions';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testListTransactionsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        TransactionFactory::new()->count(2)->create();

        $response = $this->makeCall();

        $response->assertStatus(200);
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testListTransactionsByNonAdmin(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     TransactionFactory::new()->count(2)->create();
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
    // public function testSearchTransactionsByFields(): void
    // {
    //     TransactionFactory::new()->count(3)->create();
    //     // create a model with specific field values
    //     $transaction = TransactionFactory::new()->create([
    //         // 'name' => 'something',
    //     ]);
    //
    //     // search by the above values
    //     $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($transaction->name))->makeCall();
    //
    //     $response->assertStatus(200);
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('data')
    //                 // ->where('data.0.name', $transaction->name)
    //                 ->etc()
    //     );
    // }

    public function testSearchTransactionsByHashID(): void
    {
        $transactions = TransactionFactory::new()->count(3)->create();
        $secondTransaction = $transactions[1];

        $response = $this->endpoint($this->endpoint . '?search=id:' . $secondTransaction->getHashedKey())->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                     ->where('data.0.id', $secondTransaction->getHashedKey())
                    ->etc()
        );
    }
}
