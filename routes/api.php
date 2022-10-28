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

Route::middleware(['cors'])->group(function () {
    Route::get('/eddyenin',function(){
        return response(["slackUsername" => "eddyenin6",
            "backend" => true,
            "age" => 28,
            "bio" => "My name is Edidiong Akpaenin. I am a web developer."])
            ->header('Content-type','application/json')
            ->header('Access-Control-Allow-Origin', '*');
    });
 });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
