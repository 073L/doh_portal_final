<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebListing extends Model
{
    use HasFactory;

    // Define fillable attributes
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'additional_details',
        'local_link',
        'external_link',
    ];

    // Define the relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
