<?php

namespace App\Service;

use App\Models\FollowUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PersonFollowService {

    public function followPerson($personId): FollowUser
    {

        $exist = FollowUser::where('user_id', Auth::user()->id)->where('follow_id', $personId)->first();

        if($exist)
            return $exist;

        $follow = FollowUser::create([
            'user_id' => Auth::user()->id,
            'follow_id' => $personId
        ]);

        return $follow;
    }

    public function validatePerson($personId): Bool
    {
        $user = User::find($personId);

        if(!$user) {
            return false;
        }

        return true;
    }
}
