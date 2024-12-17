<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price_weekly',
        'price_monthly',
        'calories',
        'image',
        'is_available'
    ];
}
