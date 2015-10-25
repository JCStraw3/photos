<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Home route.

Route::get('/', 'HomeController@viewHome');

// Registration routes.

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Authentication routes.

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// User routes.

Route::get('user/{id}', 'UserController@viewReadOne');
Route::get('user/{id}/edit', 'UserController@viewUpdate');
Route::post('user/{id}', 'UserController@actionUploadImage');
Route::put('user/{id}', 'UserController@actionUpdate');

// Photo routes.

Route::get('photos', 'PhotoController@viewReadAll');
Route::get('photos/create', 'PhotoController@viewCreate');
Route::get('photos/{id}', 'PhotoController@viewReadOne');
Route::get('photos/{id}/edit', 'PhotoController@viewUpdate');
Route::post('photos', 'PhotoController@actionCreate');
Route::put('photos/{id}', 'PhotoController@actionUpdate');
Route::delete('photos/{id}', 'PhotoController@actionDelete');

// Tag routes.

Route::get('tags', 'TagController@viewReadAll');
Route::get('tags/create', 'TagController@viewCreate');
Route::get('tags/{id}', 'TagController@viewReadOne');
Route::get('tags/{id}/edit', 'TagController@viewUpdate');
Route::post('tags', 'TagController@actionCreate');
Route::put('tags/{id}', 'TagController@actionUpdate');
Route::delete('tags/{id}', 'TagController@actionDelete');

// Comment routes.

Route::get('comments', 'CommentController@viewReadAll');
Route::get('comments/{id}/edit', 'CommentController@viewUpdate');
Route::post('comments', 'CommentController@actionCreate');
Route::put('comments/{id}', 'CommentController@actionUpdate');
Route::delete('comments/{id}', 'CommentController@actionDelete');