<?php

/**
 * @apiGroup           Account
 * @apiName            ListAccounts
 *
 * @api                {GET} /v1/accounts List Accounts
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

use App\Containers\AppSection\Account\UI\API\Controllers\ListAccountsController;
use Illuminate\Support\Facades\Route;

Route::get('accounts', ListAccountsController::class)
    ->middleware(['auth:api']);

