<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    protected $fillable = [
        'name',
        'location'
    ];

    //Is this correct function..?
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
