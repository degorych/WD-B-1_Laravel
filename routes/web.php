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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {
    Route::prefix('admin')->group(function () {
        Route::get('/form/list', 'FormController@showFormsList');
        Route::post('/form/update', 'FormController@adminUpdateForm');
        Route::get('/user/list', 'UserController@showUserList')->name('userList');
        Route::get('/user/list/{id}', 'UserController@showUserData')->name('userAttr');
        Route::post('/user/list/{id}/update', 'UserController@updateUserData');
    });

    Route::prefix('user/form')->group(function () {
        Route::get('/show', 'FormController@userShowForm');
        Route::post('/send', 'FormController@userSendForm');
    });
});

