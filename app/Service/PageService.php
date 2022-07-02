<?php

namespace App\Service;

use App\Models\Page;

class PageService {
    public function createPage($request)
    {
        $page = Page::create([
            'page_name' => $request->page_name
        ]);

        return $page;
    }
}
