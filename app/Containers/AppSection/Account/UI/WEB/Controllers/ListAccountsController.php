<?php

namespace App\Containers\AppSection\Account\UI\WEB\Controllers;

use App\Containers\AppSection\Account\Actions\ListAccountsAction;
use App\Containers\AppSection\Account\UI\WEB\Requests\ListAccountsRequest;
use App\Ship\Parents\Controllers\WebController;

class ListAccountsController extends WebController
{
    public function index(ListAccountsRequest $request)
    {
        $accounts = app(ListAccountsAction::class)->run($request);
        // ...
    }
}
