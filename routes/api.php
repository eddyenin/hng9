<?php

use Illuminate\Http\Request;
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
Route::get('/eddyenin',function(){
    $response = json_encode([
        "slackUsername" => "eddyenin6",
        "backend" => true,
        "age" => 28,
        "bio" => "My name is Edidiong Akpaenin. I am a web developer."
    ]);

    return $response;
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
