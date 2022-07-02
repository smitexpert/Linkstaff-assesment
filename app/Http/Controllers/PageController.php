<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\PageCreateRequest;
use App\Models\Page;
use App\Service\PageService;
use App\Service\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    public function create(PageCreateRequest $request, PageService $pageService)
    {
        $page = $pageService->createPage($request);

        return response()->json($page, 200);
    }

    public function attachPost(CreatePostRequest $request, PostService $postService, $pageId)
    {
        $page = Page::find($pageId);
        if(!$page) {
            return response()->json([
                'message' => 'Page not found!'
            ], 404);
        }

        if(! Gate::allows('create-post', $page)) {
            return response()->json([
                'message' => 'You are not authorized to create post for this page.'
            ], 403);
        }

        $post = $postService->createPost($request, $page);

        return response()->json($post, 200);
    }
}
