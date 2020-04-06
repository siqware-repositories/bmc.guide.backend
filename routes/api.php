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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('/user', 'UserController');
Route::post('/user-register', 'UserController@register');
Route::post('/user-login', 'UserController@login');
Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('/file-upload', 'FileUploadController');
    Route::resource('/travel', 'TravelController');
    Route::resource('/travel-category', 'TravelCategoryController');
    Route::post('/image-file-upload', 'FileUploadController@file_upload');
});
//mobile api
Route::get('/travel-api', 'TravelController@index');
Route::post('/travel-api-view', 'TravelController@store');
