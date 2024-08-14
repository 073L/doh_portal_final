<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    // Fetch categories with their web listings, both sorted alphabetically
    $categories = Category::with(['webListings' => function ($query) {
        $query->orderBy('title');
    }])
    ->orderBy('name')
    ->get();

    // Pass the categories to the view
    return view('home', compact('categories'));
}
}