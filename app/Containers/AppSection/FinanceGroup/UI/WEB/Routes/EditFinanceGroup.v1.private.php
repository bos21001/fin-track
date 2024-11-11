<?php

use App\Containers\AppSection\FinanceGroup\UI\WEB\Controllers\UpdateFinanceGroupController;
use Illuminate\Support\Facades\Route;

Route::get('finance-groups/{id}/edit', [UpdateFinanceGroupController::class, 'edit'])
    ->middleware(['auth:web']);

