<?php

namespace App\Containers\AppSection\Account\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Account\Tasks\ListAccountsTask;
use App\Containers\AppSection\Account\UI\API\Requests\ListAccountsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListAccountsAction extends ParentAction
{
    public function __construct(
        private readonly ListAccountsTask $listAccountsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListAccountsRequest $request): mixed
    {
        return $this->listAccountsTask->run();
    }
}
