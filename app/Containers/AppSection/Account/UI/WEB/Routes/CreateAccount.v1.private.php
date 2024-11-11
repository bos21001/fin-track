<?php

use App\Containers\AppSection\Account\UI\WEB\Controllers\CreateAccountController;
use Illuminate\Support\Facades\Route;

Route::get('accounts/create', [CreateAccountController::class, 'create'])
    ->middleware(['auth:web']);

