<?php

namespace App\Service;

use App\Models\FollowUser;
use App\Models\UserPost;
use Illuminate\Support\Facades\Auth;

class PersonFeedService {

    public function isEmpty(): Bool
    {
        $total = FollowUser::where('user_id', Auth::user()->id)->count();
        if($total > 0)
            return false;

        return true;
    }

    public function feed(): Object
    {
        $users = [];

        $following = FollowUser::where('user_id', Auth::user()->id)->get();

        foreach($following as $follow) {
            $users[] = $follow->follow_id;
        }

        $posts = UserPost::whereIn('user_id', $users)->paginate();

        return $posts;
    }
}
