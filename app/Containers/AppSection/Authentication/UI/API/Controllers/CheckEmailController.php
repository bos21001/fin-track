<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Authentication\UI\API\Requests\CheckEmailRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CheckEmailController extends ApiController
{
    /**
     * @throws InvalidTransformerException|NotFoundException
     */
    public function __invoke(CheckEmailRequest $request): JsonResponse
    {
        // Return empty json response because it passed the request validation
        return $this->json(null);
    }
}
