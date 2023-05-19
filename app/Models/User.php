<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'provider_id',
        'provider',
        'password',
        'phone',
        'role',
        'profile',
        'status',
        'last_login_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'profile' => 'array'
    ];


    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function wishLists()
    {
        return $this->hasMany(WishList::class);
    }

    public function getAvatar()
    {
        if (isset($this->profile['avatar_link']) && $this->profile['avatar_link']) {
            return $this->profile['avatar_link'];
        }
        if (isset($this->profile['avatar']) && $this->profile['avatar']) {
            return asset('/assets/img/upload/user/' . $this->profile['avatar']);
        } else {
            return asset('/assets/img/upload/user/user1-128x128.jpg');
        }
    }

    public function getDob()
    {
        if (isset($this->profile['dob']) && $this->profile['dob']) {
            return $this->profile['dob'];
        } else {
            return null;
        }
    }
    public function getGender()
    {
        if (isset($this->profile['gender']) && $this->profile['gender']) {
            return $this->profile['gender'] == 'Male' ? 'Male' : 'Female';
        } else {
            return 'Male';
        }
    }

    public function getCity()
    {
        if (isset($this->profile['city']) && $this->profile['city']) {
            return $this->profile['city'];
        } else {
            return null;
        }
    }
    public function getDistrict()
    {
        if (isset($this->profile['district']) && $this->profile['district']) {
            return $this->profile['district'];
        } else {
            return null;
        }
    }

    public function getWard()
    {
        if (isset($this->profile['ward']) && $this->profile['ward']) {
            return $this->profile['ward'];
        } else {
            return null;
        }
    }

    public function isAdmin()
    {
        if (isset($this->role) && $this->role === 1) {
            return 'Admin';
        } else {
            return 'User';
        }
    }
}
