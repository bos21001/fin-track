<?php

use App\Containers\AppSection\Account\UI\WEB\Controllers\UpdateAccountController;
use Illuminate\Support\Facades\Route;

Route::patch('accounts/{id}', [UpdateAccountController::class, 'update'])
    ->middleware(['auth:web']);

