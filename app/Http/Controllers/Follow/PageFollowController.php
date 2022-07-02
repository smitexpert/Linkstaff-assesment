<?php

namespace App\Http\Controllers\Follow;

use App\Http\Controllers\Controller;
use App\Service\PageFollowService;
use Illuminate\Http\Request;

class PageFollowController extends Controller
{
    public function follow(PageFollowService $pageFollowService, $pageId): Object
    {
        if(!$pageFollowService->checkPage($pageId))
            return response()->json([
                'message' => 'Page not found!'
            ], 404);

        $follow = $pageFollowService->followPage($pageId);

        return response()->json($follow, 200);
    }
}
