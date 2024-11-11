<?php

namespace App\Containers\AppSection\Account\UI\API\Tests\Functional;

use App\Containers\AppSection\Account\Data\Factories\AccountFactory;
use App\Containers\AppSection\Account\Models\Account;
use App\Containers\AppSection\Account\UI\API\Tests\ApiTestCase;

/**
 * @group account
 * @group api
 */
class DeleteAccountTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/accounts/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    public function testDeleteExistingAccount(): void
    {
        $account = AccountFactory::new()->createOne();

        $response = $this->injectId($account->id)->makeCall();

        $response->assertStatus(204);
    }

    public function testDeleteNonExistingAccount(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testGivenHaveNoAccess_CannotDeleteAccount(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     $account = AccountFactory::new()->createOne();
    //
    //     $response = $this->injectId($account->id)->makeCall();
    //
    //     $response->assertStatus(403);
    // }
}
