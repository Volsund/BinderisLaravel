<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    protected $fillable = [
        'decision_to',
        'decision_type',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
