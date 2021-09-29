<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'FrontController@index')->name('site.home');

});

//Login System
Route::group(['namespace' => 'auth'], function () {
    Route::get('login', 'LoginController@showLoginForm');
});


Auth::routes(['register' => false]);
