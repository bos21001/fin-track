<?php

/**
 * @apiGroup           Account
 * @apiName            FindAccountById
 *
 * @api                {GET} /v1/accounts/:id Find Account By Id
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

use App\Containers\AppSection\Account\UI\API\Controllers\FindAccountByIdController;
use Illuminate\Support\Facades\Route;

Route::get('accounts/{id}', FindAccountByIdController::class)
    ->middleware(['auth:api']);

