<?php

use App\Containers\AppSection\Account\UI\WEB\Controllers\UpdateAccountController;
use Illuminate\Support\Facades\Route;

Route::get('accounts/{id}/edit', [UpdateAccountController::class, 'edit'])
    ->middleware(['auth:web']);

