<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    // protect from too many attemps
    protected $maxAttempts = 1; // Default is 5
    protected $decayMinutes = 15; // Default is 1

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // 1) we validate the request
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|max:30|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'g-recaptcha-response' => 'required|recaptcha'
        ], [
            'password.min' => 'More than 8 characters are required.',
            'password.regex' => 'Combination of upper and lower case letters, numbers and special characters are required.'
        ]);

        // 2) Check if the user has surpassed their alloed maximum of login attempts
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
     
            return $this->sendLockoutResponse($request);
        }

        // 3) Check if the several users attempts to login with the same account
        $user = User::where('email', $request->input('email'))->first();

        if (auth()->guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {

            $new_session_id = \Session::getId(); //get new session_id after user sign in

            if ($user->session_id != '') {
                $last_session = \Session::getHandler()->read($user->session_id);

                if ($last_session) {
                    if (\Session::getHandler()->destroy($user->session_id)) {

                    }
                }
            }

            User::where('id', $user->id)->update(['session_id' => $new_session_id]);

            $user = auth()->guard('web')->user();

            return redirect($this->redirectTo);
        }
        \Session::put('login_error', 'Your email and password wrong!!');
        return back();

    }

    public function logout(Request $request)
    {
        \Session::flush();
        \Session::put('success', 'Logout Successful!');
        return redirect()->to('/login');
    }
}
