<?php

/**
 * @apiGroup           FinanceGroup
 * @apiName            FindFinanceGroupById
 *
 * @api                {GET} /v1/finance-groups/:id Find Finance Group By Id
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

use App\Containers\AppSection\FinanceGroup\UI\API\Controllers\FindFinanceGroupByIdController;
use Illuminate\Support\Facades\Route;

Route::get('finance-groups/{id}', FindFinanceGroupByIdController::class)
    ->middleware(['auth:api']);

