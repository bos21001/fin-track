<?php

use App\Containers\AppSection\Transaction\UI\WEB\Controllers\ListTransactionsController;
use Illuminate\Support\Facades\Route;

Route::get('transactions', [ListTransactionsController::class, 'index'])
    ->middleware(['auth:web']);

