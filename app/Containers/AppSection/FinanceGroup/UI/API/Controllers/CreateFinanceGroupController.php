<?php

namespace App\Containers\AppSection\FinanceGroup\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\FinanceGroup\Actions\CreateFinanceGroupAction;
use App\Containers\AppSection\FinanceGroup\UI\API\Requests\CreateFinanceGroupRequest;
use App\Containers\AppSection\FinanceGroup\UI\API\Transformers\FinanceGroupTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateFinanceGroupController extends ApiController
{
    public function __construct(
        private readonly CreateFinanceGroupAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateFinanceGroupRequest $request): JsonResponse
    {
        $financegroup = $this->action->run($request);

        return $this->created($this->transform($financegroup, FinanceGroupTransformer::class));
    }
}
