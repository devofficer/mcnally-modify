<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Profile;
use App\Plan;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_user = Role::where('name', 'admin')->first();
        $plan_user = Plan::where('name', 'Expert')->first();

        $user = new User();
        $user->name = 'admin';
        $user->email = 'patricionally@gmail.com';
        $user->password = Hash::make('Admin12#$');
        $user->stripe_id = '123456789';
        $user->stripe_sub = 'sub_123456789';
        $user->firstname = 'firstname';
        $user->lastname = 'lastname';
        $user->save();

        $user->roles()->attach($role_user);
        $user->plans()->attach($plan_user);

        $profile = new Profile();
        $profile->user_id = 1;
        $profile->avatar = 'avatar.jpg';
        $profile->save();
    }
}
