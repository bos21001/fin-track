<?php

namespace App\Containers\AppSection\Authentication\UI\WEB\Controllers;

use App\Containers\AppSection\Authentication\UI\WEB\Requests\VerifyEmailRequest;
use App\Ship\Parents\Controllers\WebController;

class VerifyEmailController extends WebController
{
    public function show(VerifyEmailRequest $request)
    {
        $data = $request->sanitizeInput([
            'url',
            'signature',
        ]);

        return view('appSection@authentication::verify-email', [
            'url' => empty($data['url']) ? null : $data["url"] . "&signature=" . $data["signature"],
        ]);
    }
}
