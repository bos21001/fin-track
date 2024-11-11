<?php

namespace App\Containers\AppSection\Transaction\UI\WEB\Controllers;

use App\Containers\AppSection\Transaction\Actions\ListTransactionsAction;
use App\Containers\AppSection\Transaction\UI\WEB\Requests\ListTransactionsRequest;
use App\Ship\Parents\Controllers\WebController;

class ListTransactionsController extends WebController
{
    public function index(ListTransactionsRequest $request)
    {
        $transactions = app(ListTransactionsAction::class)->run($request);
        // ...
    }
}
