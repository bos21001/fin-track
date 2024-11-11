<?php

use App\Containers\AppSection\Transaction\UI\WEB\Controllers\FindTransactionByIdController;
use Illuminate\Support\Facades\Route;

Route::get('transactions/{id}', [FindTransactionByIdController::class, 'show'])
    ->middleware(['auth:web']);

