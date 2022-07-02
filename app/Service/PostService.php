<?php

namespace App\Service;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Auth\Access\Gate;

class PostService {
    public function createPost($data, Page $page): Post
    {
        $post = Post::create([
            'page_id' => $page->id,
            'post_name' => $data->post_name,
            'post_content' => $data->post_content
        ]);

        return $post;
    }
}
