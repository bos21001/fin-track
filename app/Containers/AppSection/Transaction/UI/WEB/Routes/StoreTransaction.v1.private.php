<?php

use App\Containers\AppSection\Transaction\UI\WEB\Controllers\CreateTransactionController;
use Illuminate\Support\Facades\Route;

Route::post('transactions/store', [CreateTransactionController::class, 'store'])
    ->middleware(['auth:web']);

