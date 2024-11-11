<?php

use App\Containers\AppSection\FinanceGroup\UI\WEB\Controllers\DeleteFinanceGroupController;
use Illuminate\Support\Facades\Route;

Route::delete('finance-groups/{id}', [DeleteFinanceGroupController::class, 'destroy'])
    ->middleware(['auth:web']);

