<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\User;
use App\Profile;
use App\Card;
use Auth;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\ProfileEditRequest;
use App\Http\Requests\AvatarEditRequest;

use Stripe\Stripe;


class TestApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $stripe = new \Stripe\StripeClient(
          config('services.stripe.secret')
        );
        
        $invoices = $stripe->invoices->all(['customer' => 'cus_HPJc1bBcSkl7mc']);

        $subscription = $stripe->subscriptions->retrieve(
            'sub_HPJc2RTfie79P4',
            []
        );

        return response()->json([
            'invoices' => $invoices->data,
            'invoice1' => $invoices->data[0]->lines->data[0]->plan->id,
            'subscription' => $subscription,
        ]);
        
        /*$stripe->charges->create([
          'amount' => 2000,
          'currency' => 'usd',
          'description' => 'My First Test Charge (created for API docs)',
          'customer' => 'cus_HPJc1bBcSkl7mc'
        ]);

        $stripe = new \Stripe\StripeClient(
          config('services.stripe.secret')
        );
        
        $invoices = $stripe->invoices->all(['customer' => Auth::user()->stripe_id]);
        */

    }
}