<?php

namespace App\Containers\AppSection\Transaction\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Transaction\Actions\FindTransactionByIdAction;
use App\Containers\AppSection\Transaction\UI\API\Requests\FindTransactionByIdRequest;
use App\Containers\AppSection\Transaction\UI\API\Transformers\TransactionTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindTransactionByIdController extends ApiController
{
    public function __construct(
        private readonly FindTransactionByIdAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindTransactionByIdRequest $request): array
    {
        $transaction = $this->action->run($request);

        return $this->transform($transaction, TransactionTransformer::class);
    }
}
