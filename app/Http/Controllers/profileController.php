<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function update(Request $request)
    {
        $userId = Auth::getUser()->id;

        $name = $request->inputName;
        $email = $request->inputEmail;
        $pass = bcrypt($request->inputPassword);

        $queryArr = ['id' => $userId,'name' => $name, 'email' => $email, 'password' => $pass];

        $user = User::where('id', '=', $userId)->first()->update($queryArr);

        return redirect('/profile');

    }
}
