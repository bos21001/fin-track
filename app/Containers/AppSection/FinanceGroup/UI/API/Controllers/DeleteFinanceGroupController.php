<?php

namespace App\Containers\AppSection\FinanceGroup\UI\API\Controllers;

use App\Containers\AppSection\FinanceGroup\Actions\DeleteFinanceGroupAction;
use App\Containers\AppSection\FinanceGroup\UI\API\Requests\DeleteFinanceGroupRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteFinanceGroupController extends ApiController
{
    public function __construct(
        private readonly DeleteFinanceGroupAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteFinanceGroupRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
