<?php

namespace myGamesList\Http\Controllers\Api;

use myGamesList\Game;
use Illuminate\Http\Request;
use myGamesList\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // existed or if no results found.
        $error = ['error' => 'No results found, please try with different keywords.'];

        // Making sure the user entered a keyword.
        if($request->has('q')) {

            // Using the Laravel Scout syntax to search the products table.
            $posts = Game::search($request->get('q'))->get();

            // If there are results return them, if none, return the error message.
            return $posts->count() ? $posts : $error;

        }

        // Return the error message if no keywords existed
        return $error;
    }
}
