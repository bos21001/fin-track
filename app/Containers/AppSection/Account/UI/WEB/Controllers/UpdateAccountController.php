<?php

namespace App\Containers\AppSection\Account\UI\WEB\Controllers;

use App\Containers\AppSection\Account\Actions\FindAccountByIdAction;
use App\Containers\AppSection\Account\Actions\UpdateAccountAction;
use App\Containers\AppSection\Account\UI\WEB\Requests\EditAccountRequest;
use App\Containers\AppSection\Account\UI\WEB\Requests\UpdateAccountRequest;
use App\Ship\Parents\Controllers\WebController;

class UpdateAccountController extends WebController
{
    public function edit(EditAccountRequest $request)
    {
        $account = app(FindAccountByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateAccountRequest $request)
    {
        $account = app(UpdateAccountAction::class)->run($request);
        // ...
    }
}
