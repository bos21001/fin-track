<?php

namespace App\Containers\AppSection\FinanceGroup\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class FinanceGroup extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'FinanceGroup';
}
