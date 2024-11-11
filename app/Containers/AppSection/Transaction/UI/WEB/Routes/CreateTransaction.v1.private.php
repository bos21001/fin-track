<?php

use App\Containers\AppSection\Transaction\UI\WEB\Controllers\CreateTransactionController;
use Illuminate\Support\Facades\Route;

Route::get('transactions/create', [CreateTransactionController::class, 'create'])
    ->middleware(['auth:web']);

