<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name', 
        'description', 
        'price', 
        'stock', 
        'image_url', 
        'category_id'
    ];

    // Relationship with Categories
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'category_id');
    }

    // Relationship with CartItems
    public function cartItems()
    {
        return $this->hasMany(CartItems::class, 'product_id', 'product_id');
    }
}