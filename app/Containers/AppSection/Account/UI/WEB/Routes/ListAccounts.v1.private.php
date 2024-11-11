<?php

use App\Containers\AppSection\Account\UI\WEB\Controllers\ListAccountsController;
use Illuminate\Support\Facades\Route;

Route::get('accounts', [ListAccountsController::class, 'index'])
    ->middleware(['auth:web']);

