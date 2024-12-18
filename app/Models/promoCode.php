<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class promoCode extends Model
{
    protected $table = 'promo_codes';

    protected $fillable = [
        'code',
        'discount_amount'
    ];
}
