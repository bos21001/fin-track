<?php

namespace App\Containers\AppSection\Transaction\Data\Factories;

use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of TransactionFactory
 *
 * @extends ParentFactory<TModel>
 */
class TransactionFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
