<?php

namespace App\Containers\AppSection\Transaction\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class TransactionRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
