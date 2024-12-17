<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    use HasFactory;

    protected $primaryKey = 'testimonial_id';

    protected $fillable = [
        'customer_id', 
        'rating', 
        'comment'
    ];

    // Relationship with User
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}