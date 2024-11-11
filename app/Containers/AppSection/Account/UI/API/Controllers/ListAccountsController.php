<?php

namespace App\Containers\AppSection\Account\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Account\Actions\ListAccountsAction;
use App\Containers\AppSection\Account\UI\API\Requests\ListAccountsRequest;
use App\Containers\AppSection\Account\UI\API\Transformers\AccountTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListAccountsController extends ApiController
{
    public function __construct(
        private readonly ListAccountsAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListAccountsRequest $request): array
    {
        $accounts = $this->action->run($request);

        return $this->transform($accounts, AccountTransformer::class);
    }
}
