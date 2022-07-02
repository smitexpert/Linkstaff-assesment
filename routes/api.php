<?php

use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('auth')->group(function(){
    Route::post('register', [\App\Http\Controllers\Auth\UserRegisterController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\Auth\UserLoginController::class, 'attempt']);
});

Route::prefix('page')->middleware('auth:api')->group(function(){
    Route::post('create', [App\Http\Controllers\PageController::class, 'create']);
    Route::post('{pageId}/attach-post', [\App\Http\Controllers\PageController::class, 'attachPost']);
});


Route::prefix('person')->middleware('auth:api')->group(function(){
    Route::post('attach-post', [App\Http\Controllers\UserPostController::class, 'create']);
    Route::get('feed', [\App\Http\Controllers\PersonFeedController::class, 'feed']);
});


Route::prefix('follow')->middleware('auth:api')->group(function(){
    Route::post('person/{personId}', [\App\Http\Controllers\Follow\PersoFollowController::class, 'follow']);
});
