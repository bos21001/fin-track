<?php

use App\Containers\AppSection\Transaction\UI\WEB\Controllers\UpdateTransactionController;
use Illuminate\Support\Facades\Route;

Route::patch('transactions/{id}', [UpdateTransactionController::class, 'update'])
    ->middleware(['auth:web']);

