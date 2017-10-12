<?php

namespace App\Http\Controllers;

use App\Game;
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

    public function index()
    {
        return view('admin/index');
    }

    public function manageUsers()
    {
        // Get all users except logged in user
        $users = User::all()->except(Auth::id());

        return view('admin/manage-users', compact('users'));
    }

    public function toggleEnabledStatus($id)
    {
        $user = User::find($id);
        if ($user->enabled) {
            $user->enabled = 0;
        } else {
            $user->enabled = 1;
        }
        $user->save();
    }

    public function toggleAdminStatus($id)
    {
        $user = User::find($id);
        if ($user->admin) {
            $user->admin = 0;
        } else {
            $user->admin = 1;
        }
        $user->save();
    }

    public function manageGames()
    {
        // Get all games
        $games = Game::all();

        // Get genre by id
        $genreId = $games->genre_id;

        //Get all genres
        $genre = Genre::where('id', '=', $genreId)->get();

        return view('admin/manage-games', compact('games', 'genres'));
    }

    public function addGame(Request $request)
    {
        $game = new Game;

        $game->title = $request->gameTitle;

        $gameImgPath = '/public/images/';
        $fileName = $request->gameImg->getClientOriginalName();
        $game->image = $gameImgPath.$fileName;

        $genreTitle = $request->gameGenre;
        $genreId = Genre::where('title', '=', $genreTitle)->value('id');
        $game->genre_id = $genreId;

        $game->rating = $request->gameRating;

        $game->description = $request->gameDesc;

        $game->user_id = Auth::user()->id;

        $game->save();

        return redirect('/admin/manage-games')->with('message', 'Successfully saved game');
    }

    public function manageGenres()
    {
        // Get all the genres
        $genres = Genre::all();

        return view('admin/manage-genres', compact('genres'));
    }

    public function addGenre(Request $request)
    {
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
