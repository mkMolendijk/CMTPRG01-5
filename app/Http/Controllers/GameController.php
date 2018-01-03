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

            foreach ($game->likedBy as $usersLiked) {
                $userID[] = $usersLiked->id;
            }
        }

        // Check if user liked this game
        $liked = null;
        if (!empty($userID)) {
            if (in_array(Auth::user()->id, $userID)) {
                $liked = true;
            } else {
                $liked = false;
            }
        }

        return view('game/game-detail', compact('gameObj', 'genreObj', 'uploader', 'admin', 'likesNum', 'liked'));

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

        if (Auth::user()->admin === true) {
            return redirect('/admin/manage-games')->with('message', 'Successfully saved game');
        } else {
            return redirect('/dashboard/')->with('message', 'Successfully saved game');
        }

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

        return redirect('/game/game-detail/' . $id)->with('message', 'Successfully updated game');
    }

    public function like(Request $request)
    {
        if ($request->ajax()) {
            $gameId = $request->game_id;
            $game = Game::find($gameId);
            $userId = $request->user_id;

            $game->likedBy()->attach($userId);
        }
        return $request;
    }

    public function unlike(Request $request)
    {
        if ($request->ajax()) {
            $gameId = $request->game_id;
            $game = Game::find($gameId);
            $userId = $request->user_id;

            $game->likedBy()->detach($userId);
        }
        return $request;
    }
}
