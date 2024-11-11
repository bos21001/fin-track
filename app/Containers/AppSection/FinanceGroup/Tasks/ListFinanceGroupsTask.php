<?php

namespace App\Containers\AppSection\FinanceGroup\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\FinanceGroup\Data\Repositories\FinanceGroupRepository;
use App\Containers\AppSection\FinanceGroup\Events\FinanceGroupsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListFinanceGroupsTask extends ParentTask
{
    public function __construct(
        protected readonly FinanceGroupRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();
        FinanceGroupsListedEvent::dispatch($result);

        return $result;
    }
}
