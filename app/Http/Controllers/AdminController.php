<?php

namespace App\Http\Controllers;

use App\Genre;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin/index');
    }

    public function manageUsers() {
        // Get all users except logged in user
        $users = User::all()->except(Auth::id());

        return view('admin/manage-users', compact('users'));
    }

    public function manageGames() {
        return view('admin/manage-games');
    }

    public function manageGenres() {
        // Get all the genres
        $genres = Genre::all();

        return view('admin/manage-genres', compact('genres'));
    }

    public function addGenre(Request $request) {

        $genre = new Genre;

        $genre->title = $request->genreTitle;

        $genre->save();

        return redirect('/admin/manage-genres')->with('message', 'Successfully saved genre');
    }
}
