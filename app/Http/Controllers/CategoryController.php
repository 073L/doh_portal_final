<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Fetch all categories with their web listings and order them alphabetically by name
    $categories = Category::with('webListings')->orderBy('name')->get();

    // Return the view and pass the categories data
    return view('categories.index', compact('categories'));
}
    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create the category
        $category = Category::create([
            'name' => $request->name,
        ]);

        // Redirect back with the newly created category data
        return redirect()->route('web_listings.create', ['category_id' => $category->id])
                         ->with('success', 'Category created successfully. Now add a web listing.');
    
    }

    /**
     * Display the number of categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $categoryCount = Category::count();
        return view('categories.view', compact('categoryCount'));
    }
}
