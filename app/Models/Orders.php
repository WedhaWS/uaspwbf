<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'promo_code_id',
        'product_id',
        'order_date',
        'total_amount',
        'status',
        'address',
        'city',
        'postal_code',
        'start_date',
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
