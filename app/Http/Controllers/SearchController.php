<?php

namespace myGamesList\Http\Controllers;

use myGamesList\Game;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchQuery = $request->searchInput;

        $results = Game::where('title', 'like', '%' . $searchQuery . '%')
            ->orderBy('title')
            ->paginate(20);

        return view('/search/search-results', compact('results', 'searchQuery'));
    }
}
