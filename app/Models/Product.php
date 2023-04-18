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

    public function categories()
    {
        return $this->belongsTo(Category::class, 'foreign_key', 'category_id');
    }

    public function productImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
