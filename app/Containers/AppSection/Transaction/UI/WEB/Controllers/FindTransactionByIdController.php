<?php

namespace App\Containers\AppSection\Transaction\UI\WEB\Controllers;

use App\Containers\AppSection\Transaction\Actions\FindTransactionByIdAction;
use App\Containers\AppSection\Transaction\UI\WEB\Requests\FindTransactionByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindTransactionByIdController extends WebController
{
    public function show(FindTransactionByIdRequest $request)
    {
        $transaction = app(FindTransactionByIdAction::class)->run($request);
        // ...
    }
}
