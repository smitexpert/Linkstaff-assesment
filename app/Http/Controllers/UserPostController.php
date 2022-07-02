<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostCreateRequest;
use App\Service\UserPostService;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function create(UserPostCreateRequest $request, UserPostService $userPostService): Object
    {
        $post = $userPostService->createPost($request);
        return response()->json($post, 200);
    }
}
