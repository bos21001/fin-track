<?php

/**
 * @apiGroup           FinanceGroup
 * @apiName            UpdateFinanceGroup
 *
 * @api                {PATCH} /v1/finance-groups/:id Update Finance Group
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

use App\Containers\AppSection\FinanceGroup\UI\API\Controllers\UpdateFinanceGroupController;
use Illuminate\Support\Facades\Route;

Route::patch('finance-groups/{id}', UpdateFinanceGroupController::class)
    ->middleware(['auth:api']);

