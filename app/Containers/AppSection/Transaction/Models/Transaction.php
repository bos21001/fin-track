<?php

namespace App\Containers\AppSection\Transaction\Models;

use App\Containers\AppSection\Account\Models\Account;
use App\Ship\Parents\Models\Model as ParentModel;

class Transaction extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Transaction';

    protected $fillable = ['amount', 'type', 'date', 'description', 'name', 'status', 'account_id'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
