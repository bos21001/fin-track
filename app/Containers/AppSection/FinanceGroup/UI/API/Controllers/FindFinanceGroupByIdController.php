<?php

namespace App\Containers\AppSection\FinanceGroup\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\FinanceGroup\Actions\FindFinanceGroupByIdAction;
use App\Containers\AppSection\FinanceGroup\UI\API\Requests\FindFinanceGroupByIdRequest;
use App\Containers\AppSection\FinanceGroup\UI\API\Transformers\FinanceGroupTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindFinanceGroupByIdController extends ApiController
{
    public function __construct(
        private readonly FindFinanceGroupByIdAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindFinanceGroupByIdRequest $request): array
    {
        $financegroup = $this->action->run($request);

        return $this->transform($financegroup, FinanceGroupTransformer::class);
    }
}
