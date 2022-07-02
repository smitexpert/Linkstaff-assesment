<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageCreateRequest;
use App\Service\PageService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function create(PageCreateRequest $request, PageService $pageService)
    {
        $page = $pageService->createPage($request);

        return response()->json($page, 200);
    }
}
