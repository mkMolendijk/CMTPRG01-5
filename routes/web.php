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

//Admin route
Route::group(['middleware' => ['auth', 'admin']], function()
{
    Route::get('/admin', 'AdminController@index')->name('admin');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Profile page route
Route::get('/profile', 'ProfileController@index');
// Profile edit routes
Route::patch('/profile/updateName', 'ProfileController@updateName');
Route::patch('/profile/updateEmail', 'ProfileController@updateEmail');
Route::patch('/profile/updatePassword', 'ProfileController@updatePassword');
