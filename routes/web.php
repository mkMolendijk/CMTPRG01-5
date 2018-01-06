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

//Admin routes
Route::group(['middleware' => ['auth', 'admin']], function()
{
    // View routes
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/users', 'AdminController@manageUsers');
    Route::get('/admin/games', 'AdminController@manageGames');
    Route::get('/admin/genres', 'AdminController@manageGenres');

    // User status routes
    Route::post('/admin/{id}/toggleEnabledStatus', 'AdminController@toggleEnabledStatus');
    Route::post('/admin/{id}/toggleAdminStatus', 'AdminController@toggleAdminStatus');

    // Game status route
    Route::post('/admin/{id}/gameStatusToggle', 'AdminController@gameStatusToggle');

    // Add genre route
    Route::post('/admin/addGenre', 'AdminController@addGenre');
});

// Search route
Route::post('/search', 'SearchController@search');

// User routes
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

// Game routes
Route::get('/game/game-detail/{id}', 'GameController@showDetails');
Route::patch('/game/edit-game-details/{id}', 'GameController@editGameDetails');
Route::post('/game/add-game', 'GameController@addGame');
Route::post('game/like','GameController@like');
Route::post('game/unlike','GameController@unlike');

// Profile routes
Route::get('/profile', 'ProfileController@index');
Route::patch('/profile/updateName', 'ProfileController@updateName');
Route::patch('/profile/updateEmail', 'ProfileController@updateEmail');
Route::patch('/profile/updatePassword', 'ProfileController@updatePassword');
