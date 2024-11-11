<?php

namespace App\Containers\AppSection\Transaction\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Transaction\Actions\UpdateTransactionAction;
use App\Containers\AppSection\Transaction\UI\API\Requests\UpdateTransactionRequest;
use App\Containers\AppSection\Transaction\UI\API\Transformers\TransactionTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateTransactionController extends ApiController
{
    public function __construct(
        private readonly UpdateTransactionAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateTransactionRequest $request): array
    {
        $transaction = $this->action->run($request);

        return $this->transform($transaction, TransactionTransformer::class);
    }
}
