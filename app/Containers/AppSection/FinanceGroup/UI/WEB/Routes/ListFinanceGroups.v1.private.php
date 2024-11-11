<?php

use App\Containers\AppSection\FinanceGroup\UI\WEB\Controllers\ListFinanceGroupsController;
use Illuminate\Support\Facades\Route;

Route::get('finance-groups', [ListFinanceGroupsController::class, 'index'])
    ->middleware(['auth:web']);

