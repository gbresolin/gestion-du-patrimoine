<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('monuments', 'ApiController@getAllMonuments');
Route::middleware('auth:api')->get('monument/{id}', 'ApiController@getMonument');
Route::post('monument/create', 'ApiController@createMonument');
Route::put('monument/update/{id}', 'ApiController@updateMonument');
Route::delete('monument/delete/{id}','ApiController@deleteMonument');

Route::get('users', 'ApiController@getAllUsers');
Route::get('user/{id}', 'ApiController@getUser');
Route::post('user/create', 'ApiController@createUser');
Route::put('user/update/{id}', 'ApiController@updateUser');
Route::delete('user/delete/{id}','ApiController@deleteUser');
