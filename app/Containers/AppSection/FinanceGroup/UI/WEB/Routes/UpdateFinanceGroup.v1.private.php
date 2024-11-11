<?php

use App\Containers\AppSection\FinanceGroup\UI\WEB\Controllers\UpdateFinanceGroupController;
use Illuminate\Support\Facades\Route;

Route::patch('finance-groups/{id}', [UpdateFinanceGroupController::class, 'update'])
    ->middleware(['auth:web']);

