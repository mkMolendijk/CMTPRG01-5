<?php

namespace myGamesList\Http\Controllers;

use myGamesList\Game;
use myGamesList\Genre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function showDetails($id)
    {
        // Get game with id, genre and user
        $gameObj = Game::with(["genre", "user", "likedBy"])->where('id', '=', $id)->get();

        // Get genres for the edit game modal
        $genreObj = Genre::all();

        // Check if user is uploader
        $currentUser = Auth::user()->id;
        $uploader = false;

        foreach ($gameObj as $object) {
            if ($currentUser === $object->user_id) {
                $uploader = true;
            }
        }

        // Check if user is admin
        $admin = false;

        if (Auth::user()->admin == true) {
            $admin = true;
        }

        // Get likes
        foreach ($gameObj as $game) {
            $likesNum = $game->likedBy->count();
            
        }

        return view('game/game-detail', compact('gameObj', 'genreObj', 'uploader', 'admin', 'likesNum'));

    }

    public function likes(Request $request)
    {
        if ($request->ajax()) {
            $gameId = $request->game_id;
            $game = Game::find($gameId);
            $userId = $request->user_id;

            $game->likedBy()->attach($userId);

            return $request;
        }
        return $request;
    }
}
