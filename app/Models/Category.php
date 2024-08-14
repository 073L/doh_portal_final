<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'name',
    ];

    // Define the relationship with WebListing
    public function webListings()
    {
        return $this->hasMany(WebListing::class);
    }
}
