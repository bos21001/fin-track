<?php

namespace App\Containers\AppSection\Account\Actions;

use App\Containers\AppSection\Account\Models\Account;
use App\Containers\AppSection\Account\Tasks\FindAccountByIdTask;
use App\Containers\AppSection\Account\UI\API\Requests\FindAccountByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindAccountByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindAccountByIdTask $findAccountByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindAccountByIdRequest $request): Account
    {
        return $this->findAccountByIdTask->run($request->id);
    }
}
