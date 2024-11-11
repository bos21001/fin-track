<?php

use App\Containers\AppSection\Transaction\UI\WEB\Controllers\UpdateTransactionController;
use Illuminate\Support\Facades\Route;

Route::get('transactions/{id}/edit', [UpdateTransactionController::class, 'edit'])
    ->middleware(['auth:web']);

