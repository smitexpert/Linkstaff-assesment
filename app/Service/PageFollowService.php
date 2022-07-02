<?php

namespace App\Service;

use App\Models\FollowPage;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class PageFollowService {

    public function followPage($pageId): FollowPage
    {
        $exist = FollowPage::where('user_id', Auth::user()->id)->where('page_id', $pageId)->first();

        if($exist)
            return $exist;

        $followPage = FollowPage::create([
            'user_id' => Auth::user()->id,
            'page_id' => $pageId
        ]);

        return $followPage;
    }

    public function checkPage($pageId): Bool
    {
        $page = Page::find($pageId);

        if(!$page)
            return false;

        return true;
    }
}
