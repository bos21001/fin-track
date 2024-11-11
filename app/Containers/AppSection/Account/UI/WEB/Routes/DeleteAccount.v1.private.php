<?php

use App\Containers\AppSection\Account\UI\WEB\Controllers\DeleteAccountController;
use Illuminate\Support\Facades\Route;

Route::delete('accounts/{id}', [DeleteAccountController::class, 'destroy'])
    ->middleware(['auth:web']);

