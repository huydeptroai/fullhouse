<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id';
    protected $table = 'categories';
    protected $fillable = [
        'category_id',
        'category_name_1',
        'category_name_2',
        'category_slug',
        'category_image',
        'category_intro',
    ];
    protected $casts = [
        'category_id' => 'string'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}
