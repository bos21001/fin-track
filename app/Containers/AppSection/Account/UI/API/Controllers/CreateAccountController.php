<?php

namespace App\Containers\AppSection\Account\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Account\Actions\CreateAccountAction;
use App\Containers\AppSection\Account\UI\API\Requests\CreateAccountRequest;
use App\Containers\AppSection\Account\UI\API\Transformers\AccountTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateAccountController extends ApiController
{
    public function __construct(
        private readonly CreateAccountAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateAccountRequest $request): JsonResponse
    {
        $account = $this->action->run($request);

        return $this->created($this->transform($account, AccountTransformer::class));
    }
}
