<?php

/**
 * @apiGroup           Transaction
 * @apiName            DeleteTransaction
 *
 * @api                {DELETE} /v1/transactions/:id Delete Transaction
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

use App\Containers\AppSection\Transaction\UI\API\Controllers\DeleteTransactionController;
use Illuminate\Support\Facades\Route;

Route::delete('transactions/{id}', DeleteTransactionController::class)
    ->middleware(['auth:api']);

