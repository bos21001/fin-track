<?php

use App\Containers\AppSection\Account\UI\WEB\Controllers\CreateAccountController;
use Illuminate\Support\Facades\Route;

Route::post('accounts/store', [CreateAccountController::class, 'store'])
    ->middleware(['auth:web']);

