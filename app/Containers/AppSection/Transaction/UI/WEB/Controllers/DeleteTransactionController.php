<?php

namespace App\Containers\AppSection\Transaction\UI\WEB\Controllers;

use App\Containers\AppSection\Transaction\Actions\DeleteTransactionAction;
use App\Containers\AppSection\Transaction\UI\WEB\Requests\DeleteTransactionRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteTransactionController extends WebController
{
    public function destroy(DeleteTransactionRequest $request)
    {
        $result = app(DeleteTransactionAction::class)->run($request);
        // ...
    }
}
