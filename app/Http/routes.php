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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/my-posts', 'HomeController@userPosts');
Route::get('/new-post', 'PostController@index');

Route::get('/message', 'MessageController@index');
Route::get('/message/read/{id}', 'MessageController@view');
Route::get('/message/reply/{id}', 'MessageController@reply');
Route::get('/message/new/{id}', 'MessageController@create');
Route::get('/message/mark-read/{id}', 'MessageController@setRead');
Route::post('/message/send', 'MessageController@send');
Route::post('/message/delete/{id}', 'MessageController@delete');

Route::get('/category/add', 'CategoriesController@add');
Route::post('/category/create', 'CategoriesController@create');

Route::get('/users', 'UsersController@index');

Route::get('/settings', 'SettingsController@index');
Route::post('/settings/update', 'SettingsController@update');
Route::post('/new-post/create', 'PostController@create');

 
//////////////////
// Admin Routes //
//////////////////

// Home // 
Route::get('/admin', 'AdminHomeController@index');

// Messages // 
Route::get('/admin/messages', 'AdminMessagesController@index');
Route::get('/admin/messages/user/{id}', 'AdminMessagesController@send');
Route::get('/admin/messages/read/{id}', 'AdminMessagesController@view');
Route::get('/admin/messages/reply/{id}', 'AdminMessagesController@reply');
Route::post('/admin/messages/reply', 'AdminMessagesController@sendReply');
Route::post('/admin/messages/delete/{id}', 'AdminMessagesController@delete');

// Settings // 
Route::get('/admin/settings', 'AdminSettingsController@index');
Route::post('/admin/settings/update', 'AdminSettingsController@update');

// Themes
Route::get('/admin/theme', 'AdminThemeController@index');
Route::get('/admin/theme/view/{id}', 'AdminThemeController@view');
Route::post('/admin/theme/update/{id}', 'AdminThemeController@update');
Route::post('/admin/theme/add', 'AdminThemeController@create');
Route::get('/admin/theme/delete/{id}', 'AdminThemeController@delete');

// Manage Users
Route::get('/admin/users', 'AdminUsersController@index');
Route::get('/admin/users/view/{id}', 'AdminUsersController@view');
Route::get('/admin/users/edit/{id}', 'AdminUsersController@edit');
Route::post('/admin/users/update/{id}', 'AdminUsersController@update');
Route::get('/admin/users/password/{id}', 'AdminUsersPasswordController@index');
Route::post('/admin/users/password/{id}', 'AdminUsersPasswordController@update');
Route::get('/admin/users/delete/{id}', 'AdminUsersController@delete');

// Manage Posts 	
Route::get('/admin/posts', 'AdminPostsController@index');
Route::get('/admin/posts/edit/{id}', 'AdminPostsController@edit');
Route::post('/admin/posts/delete/{id}', 'AdminPostsController@delete');
Route::post('/admin/posts/update/{id}', 'AdminPostsController@update');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
