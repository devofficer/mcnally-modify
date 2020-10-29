<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanUser extends Model
{
    protected $table = 'plan_user';
    protected $fillable = [
        'user_id',
        'plan_id',
    ];
}