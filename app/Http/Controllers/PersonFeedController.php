<?php

namespace App\Http\Controllers;

use App\Service\PersonFeedService;
use Illuminate\Http\Request;

class PersonFeedController extends Controller
{
    public function feed(PersonFeedService $personFeedService): Object
    {
        if($personFeedService->isEmpty()) {
            return response()->json([
                'messasge' => 'No Posts Found'
            ], 204);
        }

        return response()->json($personFeedService->feed(), 200);
    }
}
