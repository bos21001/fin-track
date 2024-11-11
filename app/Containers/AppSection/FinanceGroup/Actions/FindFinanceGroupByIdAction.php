<?php

namespace App\Containers\AppSection\FinanceGroup\Actions;

use App\Containers\AppSection\FinanceGroup\Models\FinanceGroup;
use App\Containers\AppSection\FinanceGroup\Tasks\FindFinanceGroupByIdTask;
use App\Containers\AppSection\FinanceGroup\UI\API\Requests\FindFinanceGroupByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindFinanceGroupByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindFinanceGroupByIdTask $findFinanceGroupByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindFinanceGroupByIdRequest $request): FinanceGroup
    {
        return $this->findFinanceGroupByIdTask->run($request->id);
    }
}
