<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Stripe\Subscription;

use App\Mail\ThanksSuscription;

use App\User;
use App\Role;
use App\Plan;
use App\Profile;
use App\Card;
use App\Invoice;

use App\Http\Requests\UserRegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function signup()
    {
        return view('auth.register');
    }

    public function step1(UserRegisterRequest $request)
    {
        $firstname = $request['firstname'];
        $lastname  = $request['lastname'];
        $email     = $request['email'];
        session(['pass' => $request['password']]);

        $plans = Plan::all();

        return view('landingpage.register_step1', compact(['firstname','lastname','email','plans']));
    }

    public function step2(Request $request)
    {
        $plan = Plan::where('id', $request['plan'])->get();
        $plan_plan = $plan[0]->stripe_plan;
        $plan_type = explode('_', $plan[0]->stripe_plan);
        $plan_name = $plan[0]->name;

        $name = explode('@', $request['email']);

        Stripe::setApiKey(config('services.stripe.secret'));
        
        $customer = Customer::create([
            'email'  => $request['email'],
            'source' => $request['stripeToken']
        ]); 

        $subscription = Subscription::create([
            'customer' => $customer->id,
            'items' => [
                [
                    $plan_type[0] => $plan_plan,
                ],
            ],
        ]);

        $role_user = Role::where('name', 'user')->first();
        $plan_user = Plan::where('name', $plan_name)->first();

        $user = new User();
        $user->name = $name[0];
        $user->email = $request['email'];
        $user->password = Hash::make(session('pass'));
        $user->stripe_id = $customer->id;
        $user->stripe_sub = $subscription->id;
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->save();
        $user->roles()->attach($role_user);
        $user->plans()->attach($plan_user);

        $newuser = User::all()->last();

        $profile = new Profile();
        $profile->country = $request['billingCountry'];
        $profile->user_id = $newuser->id;
        $profile->avatar = 'avatar.jpg';
        $profile->save();

        $exp_m = substr($request['cardExpiry'], 0, 2);
        $exp_y = "20".substr($request['cardExpiry'], 3, 2);

        $args =[
            'name' => $request['billingName'],
            'number' => str_replace(' ', '', $request['cardNumber']),
            'branch' => strtolower($request['branch']),
            'cvc' => $request['cardCvc'],
            'expiremonth' => (int)$exp_m,
            'expireyear' => (int)$exp_y,
            'principal' => 1,
            'user_id' => $newuser->id,
            'activate' => 1,
        ];
        
        Card::create($args);



        $stripe = new \Stripe\StripeClient(
          config('services.stripe.secret')
        );

        $invoice = $stripe->invoices->retrieve(
          $subscription->latest_invoice,
          []
        );

        $args2 =[
            'user_id' => $newuser->id,
            'stripe_id' => $subscription->latest_invoice,
            'name_plan' => $plan_name,
            'card_brand' => strtolower($request['branch']),
            'card_number' => str_replace(' ', '', $request['cardNumber']),
            'paid_out' => $invoice->status,
            'number' => $invoice->number,
            'created' => $invoice->created,
            'hosted_invoice_url' => $invoice->hosted_invoice_url,
            'invoice_pdf' => $invoice->invoice_pdf,
        ];

        Invoice::create($args2);



        $email = [$request['email']];
        Mail::to($email)->send(new ThanksSuscription());
        

        /*User::create([
            'name'      => $request['firstname'].' '.$request['lastname'],
            'email'     => $request['email'],
            'password'  => Hash::make(session('pass')),
            'stripe_id' => $customer->id,
        ]);*/

        //return 'creado';
        return response()->json($subscription);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
