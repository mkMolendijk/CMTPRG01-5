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

    public function toggleEnabledStatus($id) {
        $user = User::find($id);
        if ($user->enabled){
            $user->enabled = 0;
        } else {
            $user->enabled = 1;
        }
        $user->save();
        return "Toggle Completed";
    }

    public function toggleAdminStatus($id) {
        $user = User::find($id);
        if ($user->admin){
            $user->admin = 0;
        } else {
            $user->admin = 1;
        }
        $user->save();
        return "Toggle Completed";
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
        // Create new Genre instance
        $genre = new Genre;

        // Store input data into var
        $genre->title = $request->genreTitle;

        // Save input data into db
        $genre->save();

        // Redirect with success message
        return redirect('/admin/manage-genres')->with('message', 'Successfully saved genre');
    }
}
