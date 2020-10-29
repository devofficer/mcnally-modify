<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Token;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function token(Request $request)
    {
        $number = str_replace(' ', '', $request['cardNumber']);
        $cvc = $request['cardCvc'];

        $exp_m = substr($request['cardExpiry'], 0, 2);
        $exp_y = "20".substr($request['cardExpiry'], 3, 2);

        Stripe::setApiKey(config('services.stripe.key'));

        $token = Token::create([
            'card' => [
                'number'    => $number,
                'exp_month' => (int)$exp_m,
                'exp_year'  => (int)$exp_y,
                'cvc'       => $cvc,
            ],
        ]);

        return response()->json($token);
    }

    public function token1(Request $request)
    {

        Stripe::setApiKey(config('services.stripe.secret'));

        $token = Token::create([
            'card' => [
                'number'=> '4242424242424242',
                'exp_month'=> 5,
                'exp_year'=> 2021,
                'cvc'=> '314',
            ],
        ]);

        return response()->json($token);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
