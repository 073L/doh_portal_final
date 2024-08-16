<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\WebListing;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search web listings and include their categories
        $webListings = WebListing::where(function($q) use ($query) {
            $q->where('title', 'LIKE', "%{$query}%")
              ->orWhere('description', 'LIKE', "%{$query}%");
        })
        ->with('category') // Eager load categories
        ->get();

        // Get the unique category IDs from the web listings
        $categoryIds = $webListings->pluck('category_id')->unique();

        // Search categories that match the query or have associated web listings
        $categories = Category::whereIn('id', $categoryIds)
            ->orWhere('name', 'LIKE', "%{$query}%")
            ->with('webListings') // Ensure categories have their web listings loaded
            ->orderBy('name') // Sort categories alphabetically
            ->get();

        // Filter out categories without web listings if they don't match the query
        $categories = $categories->filter(function ($category) use ($query) {
            return $category->webListings->isNotEmpty() || str_contains(strtolower($category->name), strtolower($query));
        });

        // Return only the relevant results
        return view('home', [
            'categories' => $categories,
            'webListings' => $webListings,
        ]);
    }
}
