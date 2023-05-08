<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'order_date',
        'receiver_name',
        'receiver_phone',
        'shipping_address',
        'shipping_district',
        'shipping_city',
        'shipping_fee',
        'payment_method',
        'note',
        'status',
        'approved_by',
        'user_id',
        'coupon_id',
    ];

    //many - one
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //many - one
    public function coupon()    
    {
        return $this->belongsTo(Coupon::class);
    }
    //one - many
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }
    
    //many - many
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id');
    }
}
