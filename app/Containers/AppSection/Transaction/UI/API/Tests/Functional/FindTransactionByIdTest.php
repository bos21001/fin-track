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
class FindTransactionByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/transactions/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testFindTransaction(): void
    {
        $transaction = TransactionFactory::new()->createOne();

        $response = $this->injectId($transaction->id)->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $this->encode($transaction->id))
                    ->etc()
        );
    }

    public function testFindNonExistingTransaction(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    public function testFindFilteredTransactionResponse(): void
    {
        $transaction = TransactionFactory::new()->createOne();

        $response = $this->injectId($transaction->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $transaction->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
    // public function testFindTransactionWithRelation(): void
    // {
    //     $transaction = TransactionFactory::new()->createOne();
    //     $relation = 'roles';
    //
    //     $response = $this->injectId($transaction->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
    //
    //     $response->assertStatus(200);
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //           $json->has('data')
    //               ->where('data.id', $transaction->getHashedKey())
    //               ->count("data.$relation.data", 1)
    //               ->where("data.$relation.data.0.name", 'something')
    //               ->etc()
    //     );
    // }
}
