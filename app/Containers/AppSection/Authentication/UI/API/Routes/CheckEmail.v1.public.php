<?php

/**
 * @apiGroup           Authentication
 * @apiName            CheckEmail
 *
 * @api                {GET} /v1/email/check Check Email
 * @apiDescription     Check if the email is already registered
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} email The email to check
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {}
 */

use App\Containers\AppSection\Authentication\UI\API\Controllers\CheckEmailController;
use Illuminate\Support\Facades\Route;

Route::get('email/check', CheckEmailController::class)
->name('authentication.email.check');

