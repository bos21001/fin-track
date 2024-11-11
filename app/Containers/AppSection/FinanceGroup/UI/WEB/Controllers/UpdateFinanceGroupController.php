<?php

namespace App\Containers\AppSection\FinanceGroup\UI\WEB\Controllers;

use App\Containers\AppSection\FinanceGroup\Actions\FindFinanceGroupByIdAction;
use App\Containers\AppSection\FinanceGroup\Actions\UpdateFinanceGroupAction;
use App\Containers\AppSection\FinanceGroup\UI\WEB\Requests\EditFinanceGroupRequest;
use App\Containers\AppSection\FinanceGroup\UI\WEB\Requests\UpdateFinanceGroupRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateFinanceGroupController extends WebController
{
    public function edit(EditFinanceGroupRequest $request)
    {
        $financegroup = app(FindFinanceGroupByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateFinanceGroupRequest $request)
    {
        $financegroup = app(UpdateFinanceGroupAction::class)->run($request);
        // ...
    }
}
