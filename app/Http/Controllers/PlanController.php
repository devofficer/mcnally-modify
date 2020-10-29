<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\User;
use App\PlanUser;
use App\Card;
use App\Invoice;

use Stripe\Stripe;

use Auth;

class PlanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list(Request $request)
    {
        $plans = Plan::All();
        $user = PlanUser::where('user_id', Auth::user()->id)->get();
        $user = $user[0];

        // ->detach($roleId)
        return response()->json(['plans' => $plans, 'user' => $user]);
    }

    public function change(Request $request)
    {
        // primero cancelar suscripcion actual en stripe
        /*$stripe = new \Stripe\StripeClient(
          config('services.stripe.secret')
        );

        $stripe->subscriptions->cancel(
          Auth::user()->stripe_sub,
          []
        );*/

        $card = Card::where('user_id', Auth::user()->id)
                    ->where('principal', 1)
                    ->get();

        $card = $card[0];

        $plan = Plan::where('id', $request['update'])->get();
        $plan = $plan[0];

        $plan_plan = $plan->stripe_plan;
        $plan_type = explode('_', $plan->stripe_plan);


        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $subscription = \Stripe\Subscription::retrieve(Auth::user()->stripe_sub);

        $newSubscription = \Stripe\Subscription::update(Auth::user()->stripe_sub, [
          'cancel_at_period_end' => false,
          'proration_behavior' => 'always_invoice',
          'items' => [
            [
              'id' => $subscription->items->data[0]->id,
              $plan_type[0] => $plan_plan,
            ],
          ],
        ]);


        $stripe = new \Stripe\StripeClient(
          config('services.stripe.secret')
        );

        $invoice = $stripe->invoices->retrieve(
          $newSubscription->latest_invoice,
          []
        );

        $args2 =[
            'user_id' => Auth::user()->id,
            'stripe_id' => $newSubscription->latest_invoice,
            'name_plan' => $plan->name,
            'card_brand' => $card->branch,
            'card_number' => $card->number,
            'paid_out' => $invoice->status,
            'number' => $invoice->number,
            'created' => $invoice->created,
            'hosted_invoice_url' => $invoice->hosted_invoice_url,
            'invoice_pdf' => $invoice->invoice_pdf,
        ];

        Invoice::create($args2);


        $user = User::find(Auth::user()->id);

        $user->plans()->detach($request['current']);

        $user->plans()->attach($request['update']);

        User::where('id', Auth::user()->id)->update(['stripe_sub' => $newSubscription->id]);

        return response()->json($newSubscription);
    }

    public function pricing(Request $request)
    {
      if(!$request->ajax()){
        return view('admin.index');
      }
    }
}
