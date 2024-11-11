<?php

namespace App\Containers\AppSection\FinanceGroup\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\FinanceGroup\Actions\ListFinanceGroupsAction;
use App\Containers\AppSection\FinanceGroup\UI\API\Requests\ListFinanceGroupsRequest;
use App\Containers\AppSection\FinanceGroup\UI\API\Transformers\FinanceGroupTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListFinanceGroupsController extends ApiController
{
    public function __construct(
        private readonly ListFinanceGroupsAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListFinanceGroupsRequest $request): array
    {
        $financegroups = $this->action->run($request);

        return $this->transform($financegroups, FinanceGroupTransformer::class);
    }
}
