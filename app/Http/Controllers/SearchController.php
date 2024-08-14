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

        // Search categories and web listings
        $categories = Category::where('name', 'LIKE', "%{$query}%")
        ->orWhereHas('webListings', function ($q) use ($query) {
            $q->whereAny(['title', 'description'], 'LIKE', "%{$query}%");
        })
        ->with('webListings')
        ->orderBy('name') // Sort categories alphabetically
        ->get();
    

        return view('home', compact('categories'));
    }
}
?>
