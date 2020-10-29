<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'number',
        'branch',
        'name',
        'cvc',
        'expiremonth',
        'expireyear',
        'principal',
        'user_id',
        'activate',
    ];
}
