<?php

namespace App\Containers\AppSection\FinanceGroup\UI\WEB\Controllers;

use App\Containers\AppSection\FinanceGroup\Actions\ListFinanceGroupsAction;
use App\Containers\AppSection\FinanceGroup\UI\WEB\Requests\ListFinanceGroupsRequest;
use App\Ship\Parents\Controllers\WebController;

class ListFinanceGroupsController extends WebController
{
    public function index(ListFinanceGroupsRequest $request)
    {
        $financegroups = app(ListFinanceGroupsAction::class)->run($request);
        // ...
    }
}
