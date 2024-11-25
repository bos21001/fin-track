<?php

namespace App\Containers\AppSection\Authentication\UI\WEB\Controllers;

use App\Containers\AppSection\Authentication\Actions\RegisterUserAction;
use App\Containers\AppSection\Authentication\UI\WEB\Requests\RegisterUserRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\RedirectResponse;

class RegisterUserController extends WebController
{
    public function __invoke(RegisterUserRequest $request, RegisterUserAction $action): RedirectResponse
    {
        $action->transactionalRun($request);

        return redirect()->intended();
    }
}
