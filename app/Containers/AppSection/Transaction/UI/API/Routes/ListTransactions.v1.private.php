<?php

/**
 * @apiGroup           Transaction
 * @apiName            ListTransactions
 *
 * @api                {GET} /v1/transactions List Transactions
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

use App\Containers\AppSection\Transaction\UI\API\Controllers\ListTransactionsController;
use Illuminate\Support\Facades\Route;

Route::get('transactions', ListTransactionsController::class)
    ->middleware(['auth:api']);

