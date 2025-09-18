<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('master.dashboard');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        // Implement your search logic here, e.g., querying the database
        $results = []; // Replace with actual search results

        return view('master.search-results', compact('results', 'query'));
    }

    public function search_results()
    {
        return view('master.search-results');
    }
}
