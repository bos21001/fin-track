<?php

namespace App\Containers\AppSection\Account\UI\WEB\Controllers;

use App\Containers\AppSection\Account\Actions\FindAccountByIdAction;
use App\Containers\AppSection\Account\UI\WEB\Requests\FindAccountByIdRequest;
use App\Ship\Parents\Controllers\WebController;

class FindAccountByIdController extends WebController
{
    public function show(FindAccountByIdRequest $request)
    {
        $account = app(FindAccountByIdAction::class)->run($request);
        // ...
    }
}
