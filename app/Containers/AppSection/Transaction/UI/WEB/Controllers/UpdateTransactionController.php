<?php

namespace App\Containers\AppSection\Transaction\UI\WEB\Controllers;

use App\Containers\AppSection\Transaction\Actions\FindTransactionByIdAction;
use App\Containers\AppSection\Transaction\Actions\UpdateTransactionAction;
use App\Containers\AppSection\Transaction\UI\WEB\Requests\EditTransactionRequest;
use App\Containers\AppSection\Transaction\UI\WEB\Requests\UpdateTransactionRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateTransactionController extends WebController
{
    public function edit(EditTransactionRequest $request)
    {
        $transaction = app(FindTransactionByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateTransactionRequest $request)
    {
        $transaction = app(UpdateTransactionAction::class)->run($request);
        // ...
    }
}
