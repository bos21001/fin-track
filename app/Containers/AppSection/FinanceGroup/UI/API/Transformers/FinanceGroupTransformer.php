<?php

namespace App\Containers\AppSection\FinanceGroup\UI\API\Transformers;

use App\Containers\AppSection\FinanceGroup\Models\FinanceGroup;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class FinanceGroupTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(FinanceGroup $financegroup): array
    {
        $response = [
            'object' => $financegroup->getResourceKey(),
            'id' => $financegroup->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $financegroup->id,
            'created_at' => $financegroup->created_at,
            'updated_at' => $financegroup->updated_at,
            'readable_created_at' => $financegroup->created_at->diffForHumans(),
            'readable_updated_at' => $financegroup->updated_at->diffForHumans(),
            // 'deleted_at' => $financegroup->deleted_at,
        ], $response);
    }
}
