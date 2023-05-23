<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';
    protected $casts = [
        'product_id' => 'string',
        'product_image' => 'array'
    ];
    protected $table = 'products';
    protected $fillable = [
        'product_id',
        'product_name',
        'product_slug',
        'product_image',
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
    
    //relationship
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
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

    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_details', 'product_id', 'order_id');
    }

    //get information
    public function bestSeller()
    {
        return Product::selectRaw('products.*, count("product_id") as count_product')
            ->leftJoin('order_details', 'order_details.product_id', 'like', 'products.category_id')
            ->groupBy('products.product_id')
            ->orderBy('count_product', 'desc')
            ->get();
    }

    public function avgRating()
    {
        return Review::where('product_id', 'like', $this->product_id)->avg('rating');
    }

    public function isNewProduct()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('m') == Carbon::now()->month;
    }

    public function saleOff()
    {
        return number_format($this->discount / $this->product_price * 100, 0);
    }


    public function viewProductData()
    {
        return $this->hasOne(ViewProductData::class, 'product_id', 'product_id');
    }

    public function inventory()
    {
        return $this->product_quantity - $this->viewProductData->quantity_sell;
    }
}