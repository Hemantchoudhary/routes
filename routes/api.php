<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::group(['middleware' => 'ForceJsonResponse'], function()
// {
    Route::post('/user/login', 'Api\ApiController@login')->name('login');
    Route::group(['middleware' => 'auth:api'], function()
    {
    Route::post('/user/details', 'Api\ApiController@details');
    });
    Route::post('/user/register', 'Api\ApiController@register');
// });

// Route::post('/users/login', function() {
//     // return response()->json(['users' => []]);
//     return response()->json(['token' => 'aaa.bbb.ccc']);
// });
// Route::group(['middleware'=>'auth:api'],function(){
//     Route::post('/users/login', function() {
//         return [];
//     });
// });
