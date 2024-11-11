<?php

use App\Containers\AppSection\FinanceGroup\UI\WEB\Controllers\CreateFinanceGroupController;
use Illuminate\Support\Facades\Route;

Route::get('finance-groups/create', [CreateFinanceGroupController::class, 'create'])
    ->middleware(['auth:web']);

