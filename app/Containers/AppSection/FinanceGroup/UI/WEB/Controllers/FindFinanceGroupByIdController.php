<?php

namespace App\Containers\AppSection\FinanceGroup\UI\WEB\Controllers;

use App\Containers\AppSection\FinanceGroup\Actions\FindFinanceGroupByIdAction;
use App\Containers\AppSection\FinanceGroup\UI\WEB\Requests\FindFinanceGroupByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindFinanceGroupByIdController extends WebController
{
    public function show(FindFinanceGroupByIdRequest $request)
    {
        $financegroup = app(FindFinanceGroupByIdAction::class)->run($request);
        // ...
    }
}
