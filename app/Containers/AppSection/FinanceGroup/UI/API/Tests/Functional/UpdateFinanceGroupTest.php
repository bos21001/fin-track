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
class UpdateFinanceGroupTest extends ApiTestCase
{
    protected string $endpoint = 'patch@v1/finance-groups/{id}';

    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    // TODO TEST
    public function testUpdateExistingFinanceGroup(): void
    {
        $financeGroup = FinanceGroupFactory::new()->create([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $response = $this->injectId($financeGroup->id)->makeCall($data);

        $response->assertStatus(200);
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.object', 'FinanceGroup')
                    ->where('data.id', $financeGroup->getHashedKey())
                    // ->where('data.some_field', $data['some_field'])
                    ->etc()
        );
    }

    public function testUpdateNonExistingFinanceGroup(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertStatus(404);
    }

    // TODO TEST
    // public function testUpdateExistingFinanceGroupWithEmptyValues(): void
    // {
    //     $financeGroup = FinanceGroupFactory::new()->createOne();
    //     $data = [
    //         // add some fillable fields here
    //         // 'first_field' => '',
    //         // 'second_field' => '',
    //     ];
    //
    //     $response = $this->injectId($financeGroup->id)->makeCall($data);
    //
    //     $response->assertStatus(422);
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //         $json->has('errors')
    //             // ->where('errors.first_field.0', 'assert validation errors')
    //             // ->where('errors.second_field.0', 'assert validation errors')
    //             ->etc()
    //     );
    // }
}
