<?php

namespace App\Containers\AppSection\Account\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Account\Data\Repositories\AccountRepository;
use App\Containers\AppSection\Account\Events\AccountsListedEvent;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListAccountsTask extends ParentTask
{
    public function __construct(
        protected readonly AccountRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();
        AccountsListedEvent::dispatch($result);

        return $result;
    }
}
