<?php

use App\Containers\AppSection\Authentication\UI\WEB\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::post('register', RegisterUserController::class)
    ->name('register');
