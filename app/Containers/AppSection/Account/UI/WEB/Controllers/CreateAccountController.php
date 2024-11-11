<?php

namespace App\Containers\AppSection\Account\UI\WEB\Controllers;

use App\Containers\AppSection\Account\Actions\CreateAccountAction;
use App\Containers\AppSection\Account\UI\WEB\Requests\CreateAccountRequest;
use App\Containers\AppSection\Account\UI\WEB\Requests\StoreAccountRequest;
use App\Ship\Parents\Controllers\WebController;

class CreateAccountController extends WebController
{
    public function create(CreateAccountRequest $request)
    {
    }

    public function store(StoreAccountRequest $request)
    {
        $account = app(CreateAccountAction::class)->run($request);
        // ...
    }
}
