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

// Admin route group
Route::group(['middleware' => ['auth', 'admin']], function () {
    // View routes
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/admin/users', 'AdminController@manageUsers');
    Route::get('/admin/games', 'AdminController@manageGames');
    Route::get('/admin/genres', 'AdminController@manageGenres');

    // User status routes
    Route::post('/admin/{id}/toggleEnabledStatus', 'AdminController@toggleEnabledStatus');
    Route::post('/admin/{id}/toggleAdminStatus', 'AdminController@toggleAdminStatus');

<<<<<<< HEAD
    //Game status route
    Route::get('/admin/{id}/gameStatusToggle', 'AdminController@gameStatusToggle');

    // POST routes
    Route::post('/admin/addGenre', 'AdminController@addGenre');
    Route::post('/admin/addGame', 'AdminController@addGame');

    // Edit game route
    Route::patch('/admin/editGameDetails/{id}', 'AdminController@editGameDetails');
=======
    // Game status route
    Route::post('/admin/{id}/gameStatusToggle', 'AdminController@gameStatusToggle');

    //Genre routes
    Route::post('/admin/add-genre', 'AdminController@addGenre');
    Route::post('/admin/remove-genre', 'AdminController@removeGenre');
    Route::post('/admin/edit-genre', 'AdminController@editGenre');
>>>>>>> dev
});

// User route group
Route::group(['middleware' => ['auth', 'user']], function () {
    // User routes
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

<<<<<<< HEAD
// Edit game route
Route::patch('/dashboard/editGameDetails/{id}', 'DashboardController@editGameDetails');

// Dashboard page, add game
Route::post('/dashboard/addGame', 'DashboardController@addGame');
=======
// Search route
Route::post('/search', 'SearchController@search');
>>>>>>> dev

// Game routes
Route::get('/game/game-detail/{id}', 'GameController@showDetails');
Route::patch('/game/edit-game-details/{id}', 'GameController@editGameDetails');
Route::post('/game/add-game', 'GameController@addGame');
Route::post('game/like', 'GameController@like');
Route::post('game/unlike', 'GameController@unlike');

// Profile routes
Route::get('/profile', 'ProfileController@index');
Route::post('/profile/update-name', 'ProfileController@updateName');
Route::post('/profile/update-email', 'ProfileController@updateEmail');
Route::patch('/profile/updatePassword', 'ProfileController@updatePassword');
