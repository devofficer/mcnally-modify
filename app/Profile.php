<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'city',
        'country',
        'address',
        'postalcode',
        'document',
        'birthday',
        'facebookuser',
        'about',
        'avatar',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
