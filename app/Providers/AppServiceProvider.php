<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // add Str::currency macro
        Str::macro('currency', function ($price)
        {
            return number_format($price, 2, ',', '.');
        });

        Validator::extend('recaptcha', 'App\\Validators\\ReCaptcha@validate');
    }
}