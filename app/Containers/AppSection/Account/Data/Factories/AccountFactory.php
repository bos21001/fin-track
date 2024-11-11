<?php

namespace App\Containers\AppSection\Account\Data\Factories;

use App\Containers\AppSection\Account\Models\Account;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of AccountFactory
 *
 * @extends ParentFactory<TModel>
 */
class AccountFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Account::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
