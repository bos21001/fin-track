<?php

use App\Containers\AppSection\Authentication\UI\WEB\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('email/verify', [VerifyEmailController::class, 'show']);

