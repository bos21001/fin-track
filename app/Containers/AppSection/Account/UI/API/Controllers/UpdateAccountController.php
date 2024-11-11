<?php

namespace App\Containers\AppSection\Account\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Account\Actions\UpdateAccountAction;
use App\Containers\AppSection\Account\UI\API\Requests\UpdateAccountRequest;
use App\Containers\AppSection\Account\UI\API\Transformers\AccountTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateAccountController extends ApiController
{
    public function __construct(
        private readonly UpdateAccountAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function __invoke(UpdateAccountRequest $request): array
    {
        $account = $this->action->run($request);

        return $this->transform($account, AccountTransformer::class);
    }
}
