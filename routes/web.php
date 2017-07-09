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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('user.home');
Route::prefix('user')->group(function(){

    Route::get('/logout', 'Auth\LoginController@handleLogout')->name('user.logout');
});

Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminHomeController@index')->name('admin.home');
    Route::get('/login', 'Auth\AdminLoginController@showLogin')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@handleLogin')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@handleLogout')->name('admin.logout');
    Route::resource('home','UseCRUDController');
    Route::get('/search', 'ContentController@search')->name('admin.search');
});


