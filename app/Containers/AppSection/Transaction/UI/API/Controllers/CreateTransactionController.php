<?php

namespace App\Containers\AppSection\Transaction\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Transaction\Actions\CreateTransactionAction;
use App\Containers\AppSection\Transaction\UI\API\Requests\CreateTransactionRequest;
use App\Containers\AppSection\Transaction\UI\API\Transformers\TransactionTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateTransactionController extends ApiController
{
    public function __construct(
        private readonly CreateTransactionAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateTransactionRequest $request): JsonResponse
    {
        $transaction = $this->action->run($request);

        return $this->created($this->transform($transaction, TransactionTransformer::class));
    }
}
