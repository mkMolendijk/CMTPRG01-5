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
    // View routes
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/manage-users', 'AdminController@manageUsers');
    Route::get('/admin/manage-games', 'AdminController@manageGames');
    Route::get('/admin/manage-genres', 'AdminController@manageGenres');
    Route::get('/admin/game-detail/{id}', 'AdminController@gameDetail');

    // User status routes
    Route::get('/admin/{id}/toggleEnabledStatus', 'AdminController@toggleEnabledStatus');
    Route::get('/admin/{id}/toggleAdminStatus', 'AdminController@toggleAdminStatus');

    // POST routes
    Route::post('/admin/addGenre', 'AdminController@addGenre');
    Route::post('/admin/addGame', 'AdminController@addGame');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Dashboard page, add game
Route::post('/dashboard/addGame', 'DashboardController@addGame');

// Profile page route
Route::get('/profile', 'ProfileController@index');
// Profile edit routes
Route::patch('/profile/updateName', 'ProfileController@updateName');
Route::patch('/profile/updateEmail', 'ProfileController@updateEmail');
Route::patch('/profile/updatePassword', 'ProfileController@updatePassword');
