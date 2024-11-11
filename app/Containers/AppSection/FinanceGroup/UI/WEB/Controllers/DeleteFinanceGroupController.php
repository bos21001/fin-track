<?php

namespace App\Containers\AppSection\FinanceGroup\UI\WEB\Controllers;

use App\Containers\AppSection\FinanceGroup\Actions\DeleteFinanceGroupAction;
use App\Containers\AppSection\FinanceGroup\UI\WEB\Requests\DeleteFinanceGroupRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteFinanceGroupController extends WebController
{
    public function destroy(DeleteFinanceGroupRequest $request)
    {
        $result = app(DeleteFinanceGroupAction::class)->run($request);
        // ...
    }
}
