<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Service\UserRegisterService;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function register(UserRegisterRequest $request, UserRegisterService $userRegisterService): Object
    {
        $user = $userRegisterService->create($request);
        return response()->json($user, 200);
    }
}
