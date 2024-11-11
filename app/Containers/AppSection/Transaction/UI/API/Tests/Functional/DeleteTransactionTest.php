<?php

namespace App\Containers\AppSection\Transaction\UI\API\Tests\Functional;

use App\Containers\AppSection\Transaction\Data\Factories\TransactionFactory;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Containers\AppSection\Transaction\UI\API\Tests\ApiTestCase;

/**
 * @group transaction
 * @group api
 */
class DeleteTransactionTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/transactions/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingTransaction(): void
    {
        $transaction = TransactionFactory::new()->createOne();

        $response = $this->injectId($transaction->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingTransaction(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testGivenHaveNoAccess_CannotDeleteTransaction(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     $transaction = TransactionFactory::new()->createOne();
    //
    //     $response = $this->injectId($transaction->id)->makeCall();
    //
    //     $response->assertStatus(403);
    // }
}
