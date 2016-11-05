<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'facebook_id', 'avatar', 'ic', 'phone',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
