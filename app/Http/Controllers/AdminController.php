<?php

namespace myGamesList\Http\Controllers;

use myGamesList\Game;
use myGamesList\Genre;
use myGamesList\User;
use myGamesList\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin/index');
    }

    public function manageUsers()
    {
        // Get all users except logged in user
        $users = User::all()->except(Auth::id());

        return view('admin/users', compact('users'));
    }

    public function toggleEnabledStatus(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->ajax()) {
            $user->enabled = !$user->enabled;
            $user->save();
        }
    }

    public function toggleAdminStatus(Request $request, $id)
    {
        $user = User::find($id);
        $adminRole = Role::find(2);
        if ($request->ajax()) {
            if (!$user->hasRole('Admin')) {
                $user->roles()->attach($adminRole);
            } else {
                $user->roles()->detach($adminRole);
            }
        }
    }

    public function manageGames()
    {
        // Get all games with genre model
        $games = Game::with("genre")->get();

        // Get genres for the add game modal
        $genre = Genre::all();

        return view('admin/games', compact('games', 'genre'));
    }

    public function gameStatusToggle(Request $request, $id)
    {
        $game = Game::find($id);
        if ($request->ajax()) {
            $game->enabled = !$game->enabled;
            $game->save();
        }
    }

    public function manageGenres()
    {
        // Get all the genres
        $genres = Genre::all();

        return view('admin/genres', compact('genres'));
    }

    public function addGenre(Request $request)
    {
        // Validate input
        $request->validate([
            'genreTitle' => 'bail|required|max:255'
        ]);

        // Create new Genre instance
        $genre = new Genre;

        // Store input data into var
        $genre->title = $request->genreTitle;

        // Save input data into db
        $genre->save();

        // Redirect with success message
        return redirect('/admin/genres')->with('message', 'Successfully saved genre');

    }

    public function editGenre(Request $request)
    {
        $request->validate([
            'genreTitle' => 'bail|required|max:255'
        ]);

        // Find record in db
        $genreObj = Genre::find($request->genreId);

        // Store new input data into object
        $genreObj->title = $request->genreTitle;

        // Save new input data int db
        $genreObj->save();

        // Redirect with success message
        return redirect(' /admin/genres')->with('message', 'Successfully update genre');
    }

    public function removeGenre(Request $request)
    {
        // Fetch genre
        $genreId = $request->genreId;

        // Remove genre from DB
        Genre::find($genreId)->delete();

        // Redirect back
        return redirect(' /admin/genres')->with('message', 'Successfully deleted genre');
    }
}
