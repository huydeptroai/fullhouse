<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';
    protected $casts = [
        'product_id' => 'string'
    ];
    protected $table = 'products';
    protected $fillable = [
        'product_id',
        'product_name',
        'product_slug',
        'product_material',
        'product_color',
        'product_size',
        'product_description',
        'product_price',
        'discount',
        'product_quantity',
        'featured',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id', 'product_id');
    }

    public function wishLists()
    {
        return $this->hasMany(WishList::class, 'product_id', 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'product_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'product_id');
    }

    // public function orders()
    // {
    //     return $this->belongsToMany(Order::class);
    // }
}
