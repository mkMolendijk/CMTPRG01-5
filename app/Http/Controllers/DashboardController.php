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
        $games = Game::with("genre")->get();

        return view('admin/manage-games', compact('games'));
    }

    public function addGame(Request $request)
    {
        $game = new Game;

        $game->title = $request->gameTitle;

        $fileName = $request->gameImg->getClientOriginalName();
        $fileImg = $request->gameImg;
        $gameImgPath = public_path().'/images/';

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
        // Get game with id
        $gameObj = Game::where('id', '=', $id)->first();

        // Get genre with id
        $genreObj = Genre::where('id', '=', $gameObj->genre_id)->first();

        // Get creator with id
        $creatorObj = User::where('id', '=', $gameObj->user_id)->first();

        return view('dashboard/game-detail', compact('gameObj', 'genreObj', 'creatorObj'));

    }
}
