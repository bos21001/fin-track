<?php

use App\Containers\AppSection\FinanceGroup\UI\WEB\Controllers\FindFinanceGroupByIdController;
use Illuminate\Support\Facades\Route;

Route::get('finance-groups/{id}', [FindFinanceGroupByIdController::class, 'show'])
    ->middleware(['auth:web']);

