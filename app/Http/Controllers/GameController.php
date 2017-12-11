<?php

namespace myGamesList\Http\Controllers;

use myGamesList\Game;
use myGamesList\Genre;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function showDetails ($id) {
        // Get game with id, genre and user
        $gameObj = Game::with(["genre", "user"])->where('id', '=', $id)->get();

        // Get genres for the edit game modal
        $genreObj = Genre::all();

        return view('game/game-detail', compact('gameObj', 'genreObj'));

    }
}
