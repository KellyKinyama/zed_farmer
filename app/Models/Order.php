<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * This is CRITICAL for resolving the mass assignment error (1364).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'total_paid',
        'status',
    ];

    /**
     * Get the user (buyer) that owns the Order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product that was purchased.
     */
    public function product()
    {
        // Assuming you have a Product model
        return $this->belongsTo(Product::class);
    }
}
