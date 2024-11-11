<?php

namespace App\Containers\AppSection\Transaction\UI\API\Controllers;

use App\Containers\AppSection\Transaction\Actions\DeleteTransactionAction;
use App\Containers\AppSection\Transaction\UI\API\Requests\DeleteTransactionRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteTransactionController extends ApiController
{
    public function __construct(
        private readonly DeleteTransactionAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteTransactionRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
