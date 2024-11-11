<?php

namespace App\Containers\AppSection\FinanceGroup\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\FinanceGroup\Models\FinanceGroup;
use App\Containers\AppSection\FinanceGroup\Tasks\UpdateFinanceGroupTask;
use App\Containers\AppSection\FinanceGroup\UI\API\Requests\UpdateFinanceGroupRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateFinanceGroupAction extends ParentAction
{
    public function __construct(
        private readonly UpdateFinanceGroupTask $updateFinanceGroupTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateFinanceGroupRequest $request): FinanceGroup
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateFinanceGroupTask->run($data, $request->id);
    }
}
