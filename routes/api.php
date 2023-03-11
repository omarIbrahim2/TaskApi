<?php

use App\Http\Controllers\CaourserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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


Route::apiResource("posts" , PostController::class);

Route::get('post/carousels/{postId}' , [CaourserController::class , 'index']);

Route::post("carousel/create" , [CaourserController::class , "store"]);


Route::put("carousel/update/{caourselId}" , [CaourserController::class , "update"]);

Route::delete('carousel/delete/{caourselId}' , [CaourserController::class , 'destroy']);