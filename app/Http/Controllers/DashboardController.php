<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\WebListing;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch all categories and sort them in alphabetical order
        $categories = Category::orderBy('name', 'asc')->get();
        $webListings = WebListing::all();

        // Return the view with categories and web listings data
        return view('dashboard.index', compact('categories', 'webListings'));
    }
}