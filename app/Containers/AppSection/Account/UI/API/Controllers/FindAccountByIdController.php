<?php

namespace App\Containers\AppSection\Account\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Account\Actions\FindAccountByIdAction;
use App\Containers\AppSection\Account\UI\API\Requests\FindAccountByIdRequest;
use App\Containers\AppSection\Account\UI\API\Transformers\AccountTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindAccountByIdController extends ApiController
{
    public function __construct(
        private readonly FindAccountByIdAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(FindAccountByIdRequest $request): array
    {
        $account = $this->action->run($request);

        return $this->transform($account, AccountTransformer::class);
    }
}
