<?php

namespace App\Containers\AppSection\Account\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Account\Models\Account;
use App\Containers\AppSection\Account\Tasks\UpdateAccountTask;
use App\Containers\AppSection\Account\UI\API\Requests\UpdateAccountRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateAccountAction extends ParentAction
{
    public function __construct(
        private readonly UpdateAccountTask $updateAccountTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateAccountRequest $request): Account
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateAccountTask->run($data, $request->id);
    }
}
