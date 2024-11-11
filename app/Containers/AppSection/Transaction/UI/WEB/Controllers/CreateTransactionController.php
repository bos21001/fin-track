<?php

namespace App\Containers\AppSection\Transaction\UI\WEB\Controllers;

use App\Containers\AppSection\Transaction\Actions\CreateTransactionAction;
use App\Containers\AppSection\Transaction\UI\WEB\Requests\CreateTransactionRequest;
use App\Containers\AppSection\Transaction\UI\WEB\Requests\StoreTransactionRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateTransactionController extends WebController
{
    public function create(CreateTransactionRequest $request)
    {
    }

    public function store(StoreTransactionRequest $request)
    {
        $transaction = app(CreateTransactionAction::class)->run($request);
        // ...
    }
}
