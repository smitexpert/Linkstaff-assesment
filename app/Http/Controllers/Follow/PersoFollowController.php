<?php

namespace App\Http\Controllers\Follow;

use App\Http\Controllers\Controller;
use App\Service\PersonFollowService;
use Illuminate\Http\Request;

class PersoFollowController extends Controller
{
    public function follow(PersonFollowService $personFollowService, $personId): Object
    {
        if(!$personFollowService->validatePerson($personId)) {
            return response()->json([
                'message' => 'The person is not found!'
            ], 404);
        }

        $response = $personFollowService->followPerson($personId);

        return response()->json($response, 200);
    }
}
