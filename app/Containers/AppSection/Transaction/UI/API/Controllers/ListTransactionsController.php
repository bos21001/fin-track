<?php

namespace App\Containers\AppSection\Transaction\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Transaction\Actions\ListTransactionsAction;
use App\Containers\AppSection\Transaction\UI\API\Requests\ListTransactionsRequest;
use App\Containers\AppSection\Transaction\UI\API\Transformers\TransactionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListTransactionsController extends ApiController
{
    public function __construct(
        private readonly ListTransactionsAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListTransactionsRequest $request): array
    {
        $transactions = $this->action->run($request);

        return $this->transform($transactions, TransactionTransformer::class);
    }
}
