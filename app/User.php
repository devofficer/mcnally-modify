<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function authorizeRoles($roles)
    {
        if($this->hasAnyRoles($roles)){
            return true;
        }
        abort(401, 'no estas actorizado para esta accion');
    }

    public function hasAnyRoles($roles)
    {
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRoles($role)){
                return true;
                }
            }
        }else{
            if($this->hasRoles($roles)){
            return true;
            }
        }
    }

    public function hasRoles($role)
    {
        if($this->roles()->where('name', $role)->first()){
            return true;
        } 
            return false;
    }

    //

    public function plans()
    {
        return $this->belongsToMany('App\Plan');
    }

    public function authorizePlans($plans)
    {
        if($this->hasAnyPlans($plans)){
            return true;
        }
        abort(401, 'no estas actorizado para esta accion');
    }

    public function hasAnyPlans($plans)
    {
        if(is_array($plans)){
            foreach($plans as $plan){
                if($this->hasPlans($plan)){
                return true;
                }
            }
        } else {
            if($this->hasPlans($plans)){
            return true;
            }
        }
    }

    public function hasPlans($plan)
    {
        if($this->plans()->where('name', $plan)->first()){
            return true;
        } 
            return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'stripe_id', 'firstname',
        'lastname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile() {
        return $this->hasOne('App\Profile');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\MailResetPasswordNotification($token));
    }
}
