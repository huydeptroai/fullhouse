<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $primaryKey = ['order_id','product_id'];
    protected $table = 'order_details';
    public $incrementing = false;

    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'id','order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function amount()
    {
        return $this->price * $this->quantity;
    }
}
