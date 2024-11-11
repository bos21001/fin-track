<?php

namespace App\Containers\AppSection\FinanceGroup\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\FinanceGroup\Tasks\ListFinanceGroupsTask;
use App\Containers\AppSection\FinanceGroup\UI\API\Requests\ListFinanceGroupsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListFinanceGroupsAction extends ParentAction
{
    public function __construct(
        private readonly ListFinanceGroupsTask $listFinanceGroupsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListFinanceGroupsRequest $request): mixed
    {
        return $this->listFinanceGroupsTask->run();
    }
}
