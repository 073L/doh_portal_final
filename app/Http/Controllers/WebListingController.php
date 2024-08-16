<?php

namespace App\Http\Controllers;

use App\Models\WebListing;
use App\Models\Category;
use Illuminate\Http\Request;

class WebListingController extends Controller
{
    public function index()
    {
        $categories = Category::withCount ('webListings')->get();

        // Return a view and pass the categories data
        return view ('web_listings.index', compact('categories'));
    }

    /**
     * Show the form for creating a new web listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Fetch all categories to populate the category dropdown
        $categories = Category::all();

        // If the category ID is provided in the request, pass it to the view
        $selectedCategoryId = $request->query('category_id');

        // Return the view and pass the categories data
        return view('web_listings.create', compact('categories', 'selectedCategoryId'));
    }

    /**
     * Store a newly created web listing in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'additional_details' => 'nullable|string',
            'local_link' => 'required|url',
            'external_link' => 'required|url',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Create the web listing
        WebListing::create($request->all());

        // Redirect to the web listings index with a success message
        return redirect()->route('web_listings.create')
                         ->with('success', 'Web listing created successfully.');
    }

    /**
     * Show the form for editing the specified web listing.
     *
     * @param  \App\Models\WebListing  $webListing
     * @return \Illuminate\Http\Response
     */
    public function edit(WebListing $webListing)
    {
        // Fetch all categories to populate the category dropdown
        $categories = Category::all();

        // Return the view and pass the web listing and categories data
        return view('web_listings.edit', compact('webListing', 'categories'));
    }

    /**
     * Update the specified web listing in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebListing  $webListing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebListing $webListing)
    {
        // Validate the request
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'additional_details' => 'nullable|string',
            'local_link' => 'required|url',
            'external_link' => 'required|url',
        ]);

        // Update the web listing
        $webListing->update($request->all());

        // Redirect to the web listings index with a success message
        return redirect()->route('web_listings.index')
                         ->with('success', 'Web listing updated successfully.');
    }

    /**
     * Remove the specified web listing from storage.
     *
     * @param  \App\Models\WebListing  $webListing
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebListing $webListing)
    {
        // Delete the web listing
        $webListing->delete();

        // Redirect to the web listings index with a success message
        return redirect()->route('web_listings.create')
                         ->with('success', 'Web listing deleted successfully.');
    }
}
