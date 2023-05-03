<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';
    protected $primaryKey = "code";
    protected $fillable = [
        'code',
        'name',
        'name_en',
        'full_name',
        'full_name_en',
        'administrative_unit_id',
        'administrative_region_id',
    ];
    protected $casts = [
        'code' => 'string'
    ];
    public $timestamps = false;

    public function districts()
    {
        return $this->hasMany(District::class);
    }

}
