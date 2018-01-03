<?php

namespace myGamesList\Http\Controllers;

use myGamesList\Game;
use myGamesList\Genre;
use myGamesList\User;
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
        if ($request->ajax()) {
            $user->admin = !$user->admin;
            $user->save();
        }
    }

    public function manageGames()
    {
        // Get all games with genre model
        $games = Game::with("genre")->get();

        // Get genres for the add game modal
        $genre = Genre::all();

        return view('admin/manage-games', compact('games', 'genre'));
    }

    public function addGame(Request $request)
    {
        $game = new Game;

        $game->title = $request->gameTitle;

        $fileName = $request->gameImg->getClientOriginalName();
        $fileImg = $request->gameImg;
        $gameImgPath = public_path() . '/images/';

        $fileImg->move($gameImgPath, $fileName);

        $game->image = '/images/' . $fileName;

        $genreTitle = $request->gameGenre;
        $genreId = Genre::where('title', '=', $genreTitle)->value('id');
        $game->genre_id = $genreId;

        $game->description = $request->gameDesc;

        $game->user_id = Auth::user()->id;

        $game->save();

        return redirect('/admin/manage-games')->with('message', 'Successfully saved game');
    }

    public function editGameDetails(Request $request, $id)
    {
        $gameObj = Game::find($id);

        $gameObj->title = $request->gameTitle;

        $genreTitle = $request->gameGenre;
        $genreId = Genre::where('title', '=', $genreTitle)->value('id');
        $gameObj->genre_id = $genreId;

        $gameObj->description = $request->gameDesc;

        $gameObj->save();

        return redirect('/admin/game-detail/' . $id)->with('message', 'Successfully updated game');
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
