<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'dashboard/widget', 'namespace' => 'Dashboard\Widget','middleware'=> 'auth'], function () {
    Route::resource('chip', 'ChipController');
    Route::resource('button', 'ButtonController');
    Route::resource('text', 'TextController'); 
    Route::resource('image', 'ImageController'); 

    // mix
    Route::get('mix', 'MixController@index')->name('mix.index');
    Route::get('mix/{group}/edit', 'MixController@edit')->name('mix.edit');
    Route::post('mix/{group}', 'MixController@store')->name('mix.store');
    Route::patch('mix/{group}', 'MixController@update')->name('mix.update');
});//->middleware('auth');

Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard','middleware'=> 'auth'], function () {
    Route::post('behavior/{type}/{id}', 'BehaviorController@save')->name('behavior.save');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
