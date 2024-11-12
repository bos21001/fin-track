<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class WelcomeController extends ApiController
{
    public function unversioned(): JsonResponse
    {
        $title = env("APP_NAME", config("app.name"));
        return response()->json("Welcome to $title");
    }

    public function versioned(): JsonResponse
    {
        $title = env("APP_NAME", config("app.name"));
        return response()->json("Welcome to $title (API V1)");
    }
}
