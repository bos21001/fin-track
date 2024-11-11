<?php

use App\Containers\AppSection\Transaction\UI\WEB\Controllers\DeleteTransactionController;
use Illuminate\Support\Facades\Route;

Route::delete('transactions/{id}', [DeleteTransactionController::class, 'destroy'])
    ->middleware(['auth:web']);

