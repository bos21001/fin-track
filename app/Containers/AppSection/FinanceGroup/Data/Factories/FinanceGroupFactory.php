<?php

namespace App\Containers\AppSection\FinanceGroup\Data\Factories;

use App\Containers\AppSection\FinanceGroup\Models\FinanceGroup;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of FinanceGroupFactory
 *
 * @extends ParentFactory<TModel>
 */
class FinanceGroupFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = FinanceGroup::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
