<?php

namespace App\Service;

use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class PageService {
    public function createPage($request)
    {
        $page = Page::create([
            'page_name' => $request->page_name,
            'user_id' => Auth::user()->id,
        ]);

        return $page;
    }
}
