<?php

namespace myGamesList\Http\Controllers;

use myGamesList\Game;
use myGamesList\Genre;
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
        $games = Game::all();

        foreach ($games as $game) {
            $genreId = $game->genre_id;
        }

        //Get all genres
        $genres = Genre::all();

        foreach ($genres as $genre) {
            $genreTitle = $genre['title'];
        }

        return view('dashboard.index', compact('games', 'genres', 'genreTitle'));
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
}
