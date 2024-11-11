<?php

/**
 * @apiGroup           Account
 * @apiName            UpdateAccount
 *
 * @api                {PATCH} /v1/accounts/:id Update Account
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Account\UI\API\Controllers\UpdateAccountController;
use Illuminate\Support\Facades\Route;

Route::patch('accounts/{id}', UpdateAccountController::class)
    ->middleware(['auth:api']);

