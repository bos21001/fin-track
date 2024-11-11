<?php

/**
 * @apiGroup           FinanceGroup
 * @apiName            CreateFinanceGroup
 *
 * @api                {POST} /v1/finance-groups Create Finance Group
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

use App\Containers\AppSection\FinanceGroup\UI\API\Controllers\CreateFinanceGroupController;
use Illuminate\Support\Facades\Route;

Route::post('finance-groups', CreateFinanceGroupController::class)
    ->middleware(['auth:api']);

