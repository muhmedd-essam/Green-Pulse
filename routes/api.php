<?php

use App\Http\Controllers\AskController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\friendshipController;
use App\Http\Controllers\mapsController;
use App\Http\Controllers\postController;
use App\Http\Controllers\reportsController;
use App\Http\Controllers\storyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/options', [UserController::class, 'options']);

Route::get('/index/admin', [postController::class, 'indexAdmin']);
Route::post('/index/admin/approve', [postController::class, 'storeApprove']);

Route::middleware(['auth:api'])->group(function () {
    Route::post('/post', [postController::class, 'storePost']);
    Route::get('/index/posts', [PostController::class, 'indexPost']);
    Route::get('/index/user', [PostController::class, 'indexUser']);
    Route::post('/post/comments/{comment}', [postController::class, 'storeComment']);
    Route::get('/index/post/{comments}', [postController::class, 'indexComment']);

    Route::post('/ask', [AskController::class, 'storeAsk']);
    Route::get('/index/asks', [AskController::class, 'indexAsk']);
    Route::post('/ask/comments/{comment}', [AskController::class, 'storeComment']);
    Route::get('/index/ask/{comments}', [AskController::class, 'indexComment']);

    Route::post('/report', [reportsController::class, 'storeReport']);
    Route::get('/index/reports', [reportsController::class, 'indexReport']);
    Route::post('/report/comments/{comment}', [reportsController::class, 'storeComment']);
    Route::get('/index/report/{comments}', [reportsController::class, 'indexComment']);

    Route::post('/chat/{person}', [ChatController::class, 'store']);
    Route::get('/index/{chat}', [ChatController::class, 'index']);

    Route::post('/posts/search', [postController::class, 'searchItem']);
    Route::post('/asks/search', [AskController::class, 'searchItem']);
    Route::post('/reports/search', [reportsController::class, 'searchItem']);

    Route::post('/asks/ups/{ask}', [AskController::class, 'up']);
    Route::post('/posts/ups/{ask}', [postController::class, 'up']);



    Route::post('/story', [storyController::class, 'storeStory']);
    Route::get('/indexStory', [storyController::class, 'indexStory']);

    Route::get('/indexMaps', [mapsController::class, 'indexMaps']);
    Route::get('/indexMap/{map}', [mapsController::class, 'indexMap']);

    Route::get('/indexConnections', [friendshipController::class, 'indexConnections']);
    Route::post('/follow/{follow}', [friendshipController::class, 'storeFollow']);

    Route::get('/indexRequests', [friendshipController::class, 'indexRequests']);
    Route::post('/storeAccept/{accept}', [friendshipController::class, 'storeAccept']);

    Route::get('/indexFriends', [friendshipController::class, 'indexFriends']);



});


