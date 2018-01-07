<?php

namespace myGamesList\Http\Controllers;

use myGamesList\Game;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if ($request->filled('searchInput')) {
            $searchQuery = $request->searchInput;

            $results = Game::with('user')->where('title', 'like', '%' . $searchQuery . '%')
                ->orderBy('title')
                ->paginate(10);

            return view('/search/search-results', compact('results', 'searchQuery'));
        } else {
            return redirect()->back()->with('error', 'Please enter a search term');
        }
    }
}
