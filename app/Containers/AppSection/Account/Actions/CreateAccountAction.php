<?php

namespace App\Containers\AppSection\Account\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Account\Models\Account;
use App\Containers\AppSection\Account\Tasks\CreateAccountTask;
use App\Containers\AppSection\Account\UI\API\Requests\CreateAccountRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateAccountAction extends ParentAction
{
    public function __construct(
        private readonly CreateAccountTask $createAccountTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateAccountRequest $request): Account
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createAccountTask->run($data);
    }
}
