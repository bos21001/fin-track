<?php

/**
 * @apiGroup           FinanceGroup
 * @apiName            DeleteFinanceGroup
 *
 * @api                {DELETE} /v1/finance-groups/:id Delete Finance Group
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

use App\Containers\AppSection\FinanceGroup\UI\API\Controllers\DeleteFinanceGroupController;
use Illuminate\Support\Facades\Route;

Route::delete('finance-groups/{id}', DeleteFinanceGroupController::class)
    ->middleware(['auth:api']);

