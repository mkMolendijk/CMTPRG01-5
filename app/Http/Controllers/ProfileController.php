<?php

namespace myGamesList\Http\Controllers;

use myGamesList\User;
use myGamesList\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Get user object
        $userObj = Auth::user();

        // Get games from specific user
        $gameObj = Game::with('genre')->where('user_id', '=', $userObj->id)->where('enabled', '=', 1)->get();

        return view('profile.index', compact('gameObj', 'userObj'));
    }

    public function updateName(Request $request)
    {
        // Validate input
        $request->validate([
            'inputName' => 'bail|required|max:255'
        ]);

        // Find record in db
        $userObj = User::find($request->inputId);

        // Store new input data into object
        $userObj->name = $request->inputName;

        // Save new input data int db
        $userObj->save();

        // Redirect with success message
        return redirect('/profile')->with('message', 'Successfully updated name');

    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'inputEmail' => 'bail|required|max:255'
        ]);

        $userObj = User::find($request->inputId);

        $userObj->email = $request->inputEmail;

        $userObj->save();

        return redirect('/profile')->with('message', 'Successfully updated name');
    }

    public function updatePassword(Request $request)
    {
        // Todo: Refactor this function
        $userId = Auth::getUser()->id;
        $pass = bcrypt($request->inputPassword);

        $queryArr = ['id' => $userId, 'password' => $pass];

        $user = User::where('id', '=', $userId)->first()->update($queryArr);

        return redirect('/profile');
    }
}
