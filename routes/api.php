<?php

use App\Http\Controllers\Api\MessageController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('/tokens/create', function (Request $request) {

    // ? 1|pV5fnucKN0h47K8PiYAXCLL5cvsbjkZkdUybfvUp
    // ? 3|kMGmyOk8RwWhcCATGai85beriwm8rZ82KgJPQsC5
    // $token = User::find(3)->createToken("good");
    // return ['token' => $token->plainTextToken];
});

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::group(["prefix" => "messages", "controller" => MessageController::class], function () {
        Route::post("store", "store");
        Route::get("{id}", "show");
    });
});
