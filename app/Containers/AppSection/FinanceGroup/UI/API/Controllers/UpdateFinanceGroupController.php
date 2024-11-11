<?php

namespace App\Containers\AppSection\FinanceGroup\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\FinanceGroup\Actions\UpdateFinanceGroupAction;
use App\Containers\AppSection\FinanceGroup\UI\API\Requests\UpdateFinanceGroupRequest;
use App\Containers\AppSection\FinanceGroup\UI\API\Transformers\FinanceGroupTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateFinanceGroupController extends ApiController
{
    public function __construct(
        private readonly UpdateFinanceGroupAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateFinanceGroupRequest $request): array
    {
        $financegroup = $this->action->run($request);

        return $this->transform($financegroup, FinanceGroupTransformer::class);
    }
}
