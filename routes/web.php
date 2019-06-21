<?php

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

Route::get('/', 'FrontendController@index');

Route::get('/property/{property}/show', 'FrontendController@showPropertyDetails');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/me/properties', 'HomeController@showUserProperties')->name('user.properties');

Route::post('/me/properties/{id}/apply', 'HomeController@applyForProperty')->name('user.indicate_interest');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('admin.dashboard');

    // properties routes
    Route::prefix('properties')->group(function () {
        Route::get('/', 'PropertyController@index')->name('admin.properties');
        Route::get('/{id}/show', 'PropertyController@show')->name('admin.properties.show');
        Route::get('/{propertyId}/applicants/{userId}/decline', 'PropertyController@declineInterest')
            ->name('admin.properties.interests.decline');
        Route::get('/{id}/applicants/{userId}/approve', 'PropertyController@approveInterest')
            ->name('admin.properties.interests.approve');
        Route::delete('/{property}', 'PropertyController@destroy')->name('admin.properties.destroy');
        Route::patch('/{property}', 'PropertyController@update')->name('admin.properties.update');
        Route::get('/create', 'PropertyController@create')->name('admin.properties.create');
        Route::post('/create', 'PropertyController@store');
    });

    // users routes
    Route::prefix('users')->group(function () {
        Route::get('/', 'UserController@index')->name('admin.users');
        Route::get('/{id}', 'UserController@show')->name('admin.users.show');
        Route::delete('/{user}', 'UserController@destroy')->name('admin.users.destroy');
        Route::get('/{id}/properties/{propertyId}/terminate', 'UserController@terminateTenancy')->name('admin.users.teminate_tenancy');
    });
});

Route::get('/logout', 'HomeController@logout');
