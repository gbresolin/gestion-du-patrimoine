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

Route::get('students', 'ApiController@getAllStudents');
Route::get('students/{id}', 'ApiController@getStudent');
Route::post('students/create', 'ApiController@createStudent');
Route::put('students/{id}', 'ApiController@updateStudent');
Route::delete('students/{id}','ApiController@deleteStudent');

Route::get('monuments', 'ApiController@getAllMonuments');
Route::get('monuments/{id}', 'ApiController@getMonument');
Route::post('monuments/create', 'ApiController@createMonument');
Route::put('monuments/upadate/{id}', 'ApiController@updateMonument');
Route::delete('monuments/delete/{id}','ApiController@deleteMonument');
