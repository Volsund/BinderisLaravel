<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPicture()
    {
        return $this->profile->getPicture();
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function scopeWithoutMe($query)
    {
        return $query->where('id', '<>', auth()->id());
    }
}
