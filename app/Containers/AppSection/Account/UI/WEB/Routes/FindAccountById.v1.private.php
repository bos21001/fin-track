<?php

use App\Containers\AppSection\Account\UI\WEB\Controllers\FindAccountByIdController;
use Illuminate\Support\Facades\Route;

Route::get('accounts/{id}', [FindAccountByIdController::class, 'show'])
    ->middleware(['auth:web']);

