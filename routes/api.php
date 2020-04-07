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
    Route::resource('/settings-main-location', 'MainLocationController');
    Route::resource('/restaurant', 'RestaurantController');
    Route::post('/travel-update/{id}', 'TravelController@update');
    Route::post('/restaurant-update/{id}', 'RestaurantController@update');
    Route::resource('/gallery-detail', 'GalleryDetailController');
    Route::resource('/travel-category', 'TravelCategoryController');
    Route::resource('/restaurant-category', 'RestaurantCategoryController');
    Route::post('/image-file-upload', 'FileUploadController@file_upload');
});
//mobile api
Route::get('/travel-api', 'TravelController@index');
Route::get('/restaurant-api', 'RestaurantController@index');
Route::get('/travel-api-json', 'TravelController@getJson');
Route::get('/restaurant-api-json', 'RestaurantController@getJson');
