<?php

namespace App\Containers\AppSection\FinanceGroup\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\FinanceGroup\Models\FinanceGroup;
use App\Containers\AppSection\FinanceGroup\Tasks\CreateFinanceGroupTask;
use App\Containers\AppSection\FinanceGroup\UI\API\Requests\CreateFinanceGroupRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateFinanceGroupAction extends ParentAction
{
    public function __construct(
        private readonly CreateFinanceGroupTask $createFinanceGroupTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateFinanceGroupRequest $request): FinanceGroup
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createFinanceGroupTask->run($data);
    }
}
