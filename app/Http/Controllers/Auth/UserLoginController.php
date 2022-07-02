<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Service\UserLoginService;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function attempt(UserLoginRequest $request, UserLoginService $userLoginService)
    {
        $auth = $userLoginService->attempt($request);

        if(!$auth) {
            return response()->json([
                'message' => 'Email and Password not matched!'
            ], 503);
        }

        return response()->json($auth, 200);
    }
}
