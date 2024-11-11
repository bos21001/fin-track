<?php

/**
 * @apiGroup           FinanceGroup
 * @apiName            ListFinanceGroups
 *
 * @api                {GET} /v1/finance-groups List Finance Groups
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

use App\Containers\AppSection\FinanceGroup\UI\API\Controllers\ListFinanceGroupsController;
use Illuminate\Support\Facades\Route;

Route::get('finance-groups', ListFinanceGroupsController::class)
    ->middleware(['auth:api']);

