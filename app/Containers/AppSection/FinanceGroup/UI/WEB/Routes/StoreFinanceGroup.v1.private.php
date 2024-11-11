<?php

use App\Containers\AppSection\FinanceGroup\UI\WEB\Controllers\CreateFinanceGroupController;
use Illuminate\Support\Facades\Route;

Route::post('finance-groups/store', [CreateFinanceGroupController::class, 'store'])
    ->middleware(['auth:web']);

