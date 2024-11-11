<?php

namespace App\Containers\AppSection\Transaction\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Transaction extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Transaction';
}
