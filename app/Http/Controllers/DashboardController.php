<?php

namespace myGamesList\Http\Controllers;

use myGamesList\Game;
use myGamesList\Genre;
use myGamesList\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all games with genre model
        $games = Game::with("genre")->where("enabled", "=", 1)->get();

        // Get genres for the add game modal
        $genre = Genre::all();

        return view('dashboard.index', compact('games', 'genre'));
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

        $game->rating = $request->gameRating;

        $game->description = $request->gameDesc;

        $game->user_id = Auth::user()->id;

        $game->save();

        return redirect('/dashboard/')->with('message', 'Successfully saved game');
    }

    public function gameDetail($id)
    {
        // Get game with id, genre and user
        $gameObj = Game::with(["genre", "user"])->where('id', '=', $id)->get();

        // Get genres for the edit game modal
        $genreObj = Genre::all();

        return view('dashboard/game-detail', compact('gameObj', 'genreObj'));
    }

    public function editGameDetails(Request $request, $id)
    {
        $gameObj = Game::find($id);

        $gameObj->title = $request->gameTitle;

        $genreTitle = $request->gameGenre;
        $genreId = Genre::where('title', '=', $genreTitle)->value('id');
        $gameObj->genre_id = $genreId;

        $gameObj->rating = $request->gameRating;

        $gameObj->description = $request->gameDesc;

        $gameObj->save();

        return redirect('/dashboard/game-detail/'.$id)->with('message', 'Successfully updated game');
    }
}
