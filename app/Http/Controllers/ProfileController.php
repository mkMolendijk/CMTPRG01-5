<?php

namespace App\Http\Controllers;

use App\User;
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
        return view('profile.index');
    }

    public function updateName(Request $request)
    {
        // Get User ID
        $userId = Auth::getUser()->id;
        // Set POST data to var
        $name = $request->inputName;

        // Build query
        $queryArr = ['id' => $userId, 'name' => $name];

        // Run query
        $user = User::where('id', '=', $userId)->first()->update($queryArr);

        // Redirect back to profile page
        return redirect('/profile');
    }

    public function updateEmail(Request $request)
    {
        $userId = Auth::getUser()->id;
        $email = $request->inputEmail;

        $queryArr = ['id' => $userId, 'email' => $email];

        $user = User::where('id', '=', $userId)->first()->update($queryArr);

        return redirect('/profile');
    }

    public function updatePassword(Request $request)
    {
        $userId = Auth::getUser()->id;
        $pass = bcrypt($request->inputPassword);

        $queryArr = ['id' => $userId, 'password' => $pass];

        $user = User::where('id', '=', $userId)->first()->update($queryArr);

        return redirect('/profile');
    }
}
