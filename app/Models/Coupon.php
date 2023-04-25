<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $fillable = [
        'code',
        'value',
        'status',
        'times',
        'value_order'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
