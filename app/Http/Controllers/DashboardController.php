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
}
