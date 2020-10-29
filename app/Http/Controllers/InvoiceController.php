<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

use App\Invoice;
use App\Plan;
use App\Card;
use Auth;

class InvoiceController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        try {
            $this->registerInvoices();
        } catch (\Exception $e) {
            $error = 1;
        }

        $invoices = Invoice::where('user_id', Auth::user()->id)->orderBy('created', 'desc')->get();
        return response()->json($invoices);
    }

    public function registerInvoices()
    {
        // 1 obtener todas las facturas actuales en el sistema
        $myInvoices = Invoice::where('user_id', Auth::user()->id)->get();


        // 2 obtener todas las facturas de stripe
        $stripe = new \Stripe\StripeClient(
          config('services.stripe.secret')
        );
        
        $invoices = $stripe->invoices->all(['customer' => Auth::user()->stripe_id]);
        
        $i = 0;
        foreach ($invoices->data as $invoice) {

            // 3 verifico mis facturas con las de stripe
            foreach ($myInvoices as $myInvoice) {
                $i = 0;
                if ($myInvoice['stripe_id'] == $invoice['id']) {
                    $i++;
                    break;
                }
            }

            if ($i == 0) {

                $plan = Plan::where('stripe_plan', $invoice->lines->data[0]->plan->id)->get();
                $plan = $plan[0];

                $card = Card::where('user_id', Auth::user()->id)
                    ->where('principal', 1)
                    ->get();

                $card = $card[0];

                $args2 =[
                    'user_id' => Auth::user()->id,
                    'stripe_id' => $invoice->id,
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
            }
        }  
    }
}
