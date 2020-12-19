<?php

use App\Http\Controllers\Api\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('button/all', 'Api\ButtonController@all');
    Route::get('button/group/{group}', 'Api\ButtonController@group');
    Route::resource('button', 'Api\ButtonController')->only("index", "show");

    Route::get('chip/all', 'Api\ChipController@all');
    Route::get('chip/group/{group}', 'Api\ChipController@group');
    Route::resource('chip', 'Api\ChipController')->only("index", "show");

    Route::get('image/all', 'Api\ImageController@all');
    Route::get('image/group/{group}', 'Api\ImageController@group');
    Route::resource('image', 'Api\ImageController')->only("index", "show");

    Route::get('text/all', 'Api\TextController@all');
    Route::get('text/group/{group}', 'Api\TextController@group');
    Route::resource('text', 'Api\TextController')->only("index", "show");

    Route::get('group/all', 'Api\GroupController@all');
    Route::resource('group', 'Api\GroupController')->only("index", "show");

    Route::get('mix/{group}', 'Api\MixController@show');

    Route::resource('note', 'Api\NoteController')->only("index", "show", "store", "destroy", "update");

    Route::get('verify', 'Api\UserController@verify');
});

//->middleware('auth:api');

Route::post('login', 'Api\AuthController@login');
Route::post('logout', 'Api\AuthController@logout')->middleware('auth:api');

//Route::post('login',[ AuthController::class, 'login']);