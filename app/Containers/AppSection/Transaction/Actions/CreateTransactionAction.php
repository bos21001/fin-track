<?php

namespace App\Containers\AppSection\Transaction\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Transaction\Models\Transaction;
use App\Containers\AppSection\Transaction\Tasks\CreateTransactionTask;
use App\Containers\AppSection\Transaction\UI\API\Requests\CreateTransactionRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateTransactionAction extends ParentAction
{
    public function __construct(
        private readonly CreateTransactionTask $createTransactionTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateTransactionRequest $request): Transaction
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createTransactionTask->run($data);
    }
}
