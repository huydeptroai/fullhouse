<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;
    protected $primaryKey = 'email';
    protected $table = 'newsletters';
    
    protected $fillable = ['email'];

    public $incrementing = false;
    public $timestamps = false;
}
