<?php

namespace App\Containers\AppSection\FinanceGroup\Actions;

use App\Containers\AppSection\FinanceGroup\Tasks\DeleteFinanceGroupTask;
use App\Containers\AppSection\FinanceGroup\UI\API\Requests\DeleteFinanceGroupRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteFinanceGroupAction extends ParentAction
{
    public function __construct(
        private readonly DeleteFinanceGroupTask $deleteFinanceGroupTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteFinanceGroupRequest $request): int
    {
        return $this->deleteFinanceGroupTask->run($request->id);
    }
}
