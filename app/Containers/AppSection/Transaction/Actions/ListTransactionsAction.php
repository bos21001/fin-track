<?php

namespace App\Containers\AppSection\Transaction\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Transaction\Tasks\ListTransactionsTask;
use App\Containers\AppSection\Transaction\UI\API\Requests\ListTransactionsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListTransactionsAction extends ParentAction
{
    public function __construct(
        private readonly ListTransactionsTask $listTransactionsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListTransactionsRequest $request): mixed
    {
        return $this->listTransactionsTask->run();
    }
}
