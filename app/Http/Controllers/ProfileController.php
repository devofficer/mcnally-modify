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


class ProfileController extends Controller
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
    public function index(Request $request)
    {
        if(!$request->ajax()){
            return view('admin.index');
        }

        $user = User::where('id', Auth::user()->id)->get();
        $user = $user[0];
        $profile = Profile::where('user_id', Auth::user()->id)->get();
        $profile = $profile[0];
        
        return response()->json([
            'user' => $user,
            'profile' => $profile,
        ]);

    }

    public function useredit(UserEditRequest $request, $id)
    {

        $args = [
            'name' => $request['name'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
        ];

        try {

            User::where('id', $id)->update($args);
            return response()->json(['success' => 1, 'message' => 'actualizado']);

        } catch (QueryException $e) {
            session(['success' => 2]);
            return redirect('admin/profile-settings');
        }    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profiledit(ProfileEditRequest $request, $id)
    {


         $args = [
            'city' => $request['city'],
            'country' => $request['country'],
            'address' => $request['address'],
            'postalcode' => $request['postalcode'],
            'document' => $request['document'],
            'birthday' => $request['birthday'].' 01:01:01',
            'facebookuser' => $request['facebookuser'],
            'about' => $request['about'],
        ];

        try {

            Profile::where('user_id', $id)->update($args);
            session(['success' => 1]);
            return response()->json(['success' => 1, 'message' => 'actualizado']);

        } catch (QueryException $e) {
            session(['success' => 2]);
            return redirect('admin/profile-settings');
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function avataredit(AvatarEditRequest $request, $id)
    {

        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientoriginalname();
            $file->move(public_path().'/images/profile/',$name);
        }

        $args = [
            'avatar' => $name,
        ];

        try {

            Profile::where('user_id', $id)->update($args);
            session(['success' => 1]);
            return response()->json(['success' => 1]);
            //return redirect('admin/profile-settings');

        } catch (QueryException $e) {
            session(['success' => 2]);
            return redirect('admin/profile-settings');
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
