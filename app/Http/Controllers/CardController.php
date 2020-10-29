<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests\CardCreateRequest;

use Stripe\Stripe;
use Stripe\Token;

use App\Card;
use App\User;
use Auth;

class CardController extends Controller
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
    public function index()
    {
        $cards = Card::where('user_id', Auth::user()->id)->get();
        return view('admin.cards.index', compact('cards'));
    }

    public function list()
    {
        $cards = Card::where('user_id', Auth::user()->id)->get();

        /*$content = '';
        foreach ($cards as $card) {
            if ($card->principal == 1) {
                $checked = 'checked=""';
            } else {
                $checked = '';
            }
            $content .= '<tr>
                          <th scope="row">
                            <img alt="Image" src="'.asset("assets/images/brands/".$card->branch.".svg").'" class="avatar avatar-sm avatar-square" />
                          </th>
                          <td>
                            <span class="d-block">&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; '.substr($card->number, 12, 4).'</span>
                            <small class="text-muted">Exp: '.str_pad($card->expiremonth, 2, "0", STR_PAD_LEFT).'/'.$card->expireyear.'</small>
                          </td>
                          <td>
                            <div class="custom-control custom-radio">
                              <input id="radio_'.$card->id.'" name="radio" type="radio" class="custom-control-input" onclick="changeDefault('.$card->id.')" '.$checked.'>
                              <label class="custom-control-label" for="radio_'.$card->id.'"></label>
                            </div>
                          </td>
                          <td>
                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal_'.$card->id.'"><i class="icon-squared-cross"></i> Remove card</button>
                            <!-- sample modal content -->
                            <div id="myModal_'.$card->id.'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myModalLabel">Remove Card</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                          <div id="errorCard"></div>
                                          <form action="" method="POST" id="removeCard_'.$card->id.'" enctype="multipart/form-data">
                                            <div class="form-group row mb-2">
                                              <label for="title" class="col-form-label col-lg-12">Confirm you want to remove this card: <span class="d-block">&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; '.substr($card->number, 12, 4).'</span></label>
                                            </div>
                                          </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="closeModal_'.$card->id.'" type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                            <button id="buttonFormCard" type="button" class="btn btn-danger waves-effect waves-light" onclick="this.disabled=true;removeCard('.$card->id.')">Remove Card</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                          </td>
                        </tr>';
        }*/
        
        
        return response()->json($cards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardCreateRequest $request)
    {

        $mycards = Card::where('user_id', Auth::user()->id)->get();

        foreach ($mycards as $card) {
          if ($card->number == str_replace(' ', '', $request['number'])) {
            if ($card->activate == 1) {
              abort(500);
            }
          }
        }

        $stripe = new \Stripe\StripeClient(
          config('services.stripe.secret')
        );
        
        $attachCard = $stripe->paymentMethods->attach(
          $request['id_PaymentMethods'],
          ['customer' => Auth::user()->stripe_id]
        );


        $exp_m = substr($request['expire'], 0, 2);
        $exp_y = "20".substr($request['expire'], 3, 2);

        $args =[
            'name' => $request['name'],
            'number' => str_replace(' ', '', $request['number']),
            'branch' => $request['branch'],
            'cvc' => $request['cvc'],
            'expiremonth' => (int)$exp_m,
            'expireyear' => (int)$exp_y,
            'principal' => 0,
            'user_id' => Auth::user()->id,
            'activate' => 1,
        ];

        try {
          Card::create($args);
          return response()->json(['success' => '1', $attachCard]);
        } catch (QueryException $e) {
          session(['success' => 2]);
          return response()->json(['error' => '1']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = Card::where('id', $id)->get();
        $card = $card[0];

        return view('admin.cards.show', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = Card::where('id', $id)->get();
        $card = $card[0];

        return view('admin.cards.edit', compact('card'));
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
        $exp_m = substr($request['expire'], 0, 2);
        $exp_y = "20".substr($request['expire'], 3, 2);

        $args = [
            'cvc' => $request['cvc'],
            'expiremonth' => (int)$exp_m,
            'expireyear' => (int)$exp_y,
        ];

        try {

            Card::where('id', $id)->update($args);
            session(['success' => 1]);
            return response()->json(['success' => 1]);

        } catch (QueryException $e) {
            session(['success' => 2]);
            return redirect('admin/cards');
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            Card::where('id', (int)$request['id'])->update(['activate' => 0]);
            session(['destroy' => 1]);
            return response()->json(['success' => 1]);
        } catch (QueryException $e) {
            session(['destroy' => 2]);
            return response()->json(['success' => 2]);
        }
    }

    public function default(Request $request)
    {
      $id = (int)$request['id'];
      $cards = Card::where('user_id', Auth::user()->id)->get();

      foreach ($cards as $card) {
        if ($id == $card->id) {
          Card::where('id', $card->id)->update(['principal' => 1]);
        } else {
          Card::where('id', $card->id)->update(['principal' => 0]);
        }
      }
      return response()->json(['success' => 1]);
    }

    public function createPaymentMethods(CardCreateRequest $request)
    {
        $exp_m = substr($request['expire'], 0, 2);
        $exp_y = "20".substr($request['expire'], 3, 2);

        $stripe = new \Stripe\StripeClient(
            config('services.stripe.secret')
        );
        
        $paymentMethods = $stripe->paymentMethods->create([
            'type' => 'card',
            'card' => [
                'number' => str_replace(' ', '', $request['number']),
                'exp_month' => $exp_m,
                'exp_year' => $exp_y,
                'cvc' => $request['cvc'],
            ],
        ]);
        return response()->json($paymentMethods);
    }
}
