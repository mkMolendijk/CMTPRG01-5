<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('dashboard.index');
    }

    public function addGame(Request $request)
    {
        // Get User ID
        $userId = Auth::getUser()->id;
        // Set POST data to var
        var_dump($request);

        // Build query
//        $queryArr = ['id' => $userId, 'name' => $name];

        // Run query
//        $user = User::where('id', '=', $userId)->first()->update($queryArr);

        // Redirect back to profile page
//        return redirect('/profile');
    }
}
