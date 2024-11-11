<?php

namespace App\Containers\AppSection\Account\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Account extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Account';
}
