<?php

namespace App\Containers\AppSection\Account\UI\API\Controllers;

use App\Containers\AppSection\Account\Actions\DeleteAccountAction;
use App\Containers\AppSection\Account\UI\API\Requests\DeleteAccountRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeleteAccountController extends ApiController
{
    public function __construct(
        private readonly DeleteAccountAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeleteAccountRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
