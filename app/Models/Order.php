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
        'payment_status'
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
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    //many - many
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id');
    }

    //total of 1 order
    public function getSubtotal()
    {
        return $this->orderDetails->sum(function ($item) {
            return $item->price * $item->quantity;
        });
    }

    public function getValueCoupon()
    {
        if (isset($this->coupon) && $this->coupon_id != null) {
            return $this->coupon->value;
        }
        return 0;
    }

    public function getTotal()
    {
        return $this->getSubtotal() + $this->shipping_fee - $this->getValueCoupon();
    }


    public function getShippingStatus()
    {
        $order_status = [
            1 => "Order received",
            2 => "Confirmed",
            3 => "Packaging process",
            4 => "Package on delivery",
            5 => "Package received",
            6 => "Canceled"
        ];
        return $order_status[$this->status];
    }

    public function getPaymentStatus()
    {
        $pay_status = [
            1 => "Not yet",
            2 => "Finished"
        ];
        return $pay_status[$this->payment_status];
    }

    public function getPaymentMethod()
    {
        $paymentMethod = [
            1 => "COD",
            2 => "PayPal"
        ];
        return $paymentMethod[$this->payment_method];
    }
}
