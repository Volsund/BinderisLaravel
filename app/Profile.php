<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    protected $fillable = [
        'full_name',
        'profile_picture_name',
        'surname',
        'age',
        'sex',
        'location',
        'min_age',
        'max_age',
        'gender_interest',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPicture()
    {
        if ($this->profile_picture == null) {
            return env('APP_URL') . '/pictures/default.png';
        }
        return Storage::url($this->profile_picture);
    }

    public function scopeWithoutMe($query)
    {
        return $query->where('id', '<>', auth()->id());
    }

}
