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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {
    Route::prefix('admin')->group(function () {
        Route::get('/user/list', 'UserController@showUserList')->name('userList');
        Route::get('/user/list/{id}', 'UserController@showUserData')->name('userAttr');
        Route::post('/user/list/{id}/update', 'UserController@updateUserData');

        Route::resource('form', 'FormController');
    });

    Route::resource('user/form', 'FormController')->only(['create', 'store'])->middleware('can:isNotBlocked,App\User');
});
