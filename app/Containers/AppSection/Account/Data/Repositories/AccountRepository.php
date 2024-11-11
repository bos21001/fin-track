<?php

namespace App\Containers\AppSection\Account\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class AccountRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
