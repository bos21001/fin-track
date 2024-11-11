<?php

namespace App\Containers\AppSection\Account\UI\API\Transformers;

use App\Containers\AppSection\Account\Models\Account;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class AccountTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Account $account): array
    {
        $response = [
            'object' => $account->getResourceKey(),
            'id' => $account->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $account->id,
            'created_at' => $account->created_at,
            'updated_at' => $account->updated_at,
            'readable_created_at' => $account->created_at->diffForHumans(),
            'readable_updated_at' => $account->updated_at->diffForHumans(),
            // 'deleted_at' => $account->deleted_at,
        ], $response);
    }
}
