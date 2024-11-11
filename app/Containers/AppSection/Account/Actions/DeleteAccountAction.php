<?php

namespace App\Containers\AppSection\Account\Actions;

use App\Containers\AppSection\Account\Tasks\DeleteAccountTask;
use App\Containers\AppSection\Account\UI\API\Requests\DeleteAccountRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteAccountAction extends ParentAction
{
    public function __construct(
        private readonly DeleteAccountTask $deleteAccountTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteAccountRequest $request): int
    {
        return $this->deleteAccountTask->run($request->id);
    }
}
