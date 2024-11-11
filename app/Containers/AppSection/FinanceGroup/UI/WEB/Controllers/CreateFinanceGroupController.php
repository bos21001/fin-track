<?php

namespace App\Containers\AppSection\FinanceGroup\UI\WEB\Controllers;

use App\Containers\AppSection\FinanceGroup\Actions\CreateFinanceGroupAction;
use App\Containers\AppSection\FinanceGroup\UI\WEB\Requests\CreateFinanceGroupRequest;
use App\Containers\AppSection\FinanceGroup\UI\WEB\Requests\StoreFinanceGroupRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateFinanceGroupController extends WebController
{
    public function create(CreateFinanceGroupRequest $request)
    {
    }

    public function store(StoreFinanceGroupRequest $request)
    {
        $financegroup = app(CreateFinanceGroupAction::class)->run($request);
        // ...
    }
}
