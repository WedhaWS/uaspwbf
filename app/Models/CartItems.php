<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    use HasFactory;

    protected $primaryKey = 'cart_item_id';

    protected $fillable = [
        'cart_id', 
        'product_id', 
        'quantity', 
        'subtotal'
    ];

    // Relationship with Cart
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'cart_id');
    }

    // Relationship with Products
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'product_id');
    }
}