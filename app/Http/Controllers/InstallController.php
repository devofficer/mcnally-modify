<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Token;

class InstallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function install(Request $request)
    {
        try {
            \Artisan::call('migrate:refresh  --seed');
            return 'Migracion correcta';
        } catch (Exception $e) {
            return 'error';
        }
    }
}
