<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia; // <-- NEW
use Spatie\MediaLibrary\InteractsWithMedia; // <-- NEW

class Product extends Model implements HasMedia // <-- NEW
{
    use HasFactory, InteractsWithMedia; // <-- NEW

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price',
        'quantity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Optional: Define a media collection for organization
    public function registerMediaCollections(): void
    {
        // This is the default collection. We can use a custom name like 'product_images' if preferred.
        $this->addMediaCollection('images');
    }
}