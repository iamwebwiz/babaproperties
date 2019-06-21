<?php

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

Route::namespace ('Api')->group(function () {
    Route::get('/home', 'FrontendController@index');
    Route::get('/filter', 'FrontendController@filterProperties');
    Route::get('/property/{id}', 'FrontendController@fetchProperty');
});
