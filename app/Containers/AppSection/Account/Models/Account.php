<?php

namespace App\Containers\AppSection\Account\Models;

use App\Containers\AppSection\FinanceGroup\Models\FinanceGroup;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Ship\Parents\Models\Model as ParentModel;

class Account extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Account';

    protected $fillable = ['name', 'type', 'balance', 'finance_group_id'];

    public function financeGroup()
    {
        return $this->belongsTo(FinanceGroup::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function calculateBalance()
    {
        return $this->transactions()->sum('amount');
    }
}
