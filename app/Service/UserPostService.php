<?php

namespace App\Service;

use App\Models\UserPost;
use Illuminate\Support\Facades\Auth;

class UserPostService {
    public function createPost($data): UserPost
    {
        $post = UserPost::create([
            'user_id' => Auth::user()->id,
            'post_name' => $data->post_name,
            'post_content' => $data->post_content
        ]);

        return $post;
    }
}
