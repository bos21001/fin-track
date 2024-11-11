<?php

namespace App\Containers\AppSection\FinanceGroup\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class FinanceGroupRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
