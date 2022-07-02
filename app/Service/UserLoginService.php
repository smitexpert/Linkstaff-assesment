<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserLoginService {
    public function attempt($request): Array
    {
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return false;
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('auth_token')->accessToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }
}
