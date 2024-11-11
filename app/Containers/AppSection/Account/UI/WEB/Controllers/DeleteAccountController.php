<?php

namespace App\Containers\AppSection\Account\UI\WEB\Controllers;

use App\Containers\AppSection\Account\Actions\DeleteAccountAction;
use App\Containers\AppSection\Account\UI\WEB\Requests\DeleteAccountRequest;
use App\Ship\Parents\Controllers\WebController;

class DeleteAccountController extends WebController
{
    public function destroy(DeleteAccountRequest $request)
    {
        $result = app(DeleteAccountAction::class)->run($request);
        // ...
    }
}
