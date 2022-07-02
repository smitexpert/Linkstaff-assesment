<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRegisterService {

    public function create($data)
    {
        $user = User::create([
            'first_name' => $data->first_name,
            'last_name' => $data->last_name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        return $user;
    }

}
