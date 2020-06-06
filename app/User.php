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

    public function decisions()
    {
        return $this->hasMany(Decision::class);
    }

    public function scopeWithoutMe($query)
    {
        return $query->where('id', '<>', auth()->id());
    }

    public function scopeFilterDecision($query)
    {
        $decisions = $this->decisions()->pluck('decision_to');

        $query->where('id', '<>', $this->id)
            ->whereNotIN('id', $decisions->all());
    }


    public function scopeFilterAge($query)
    {
        $authMaxAge = $this->profile()->first()->max_age;
        $authMinAge = $this->profile()->first()->min_age;


//        $query->whereBetween($this->profile()->first()->age, $authMinAge,'and', $authMaxAge);

    }
}
