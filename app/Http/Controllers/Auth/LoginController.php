<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    protected function redirectTo()
    {
        if(Auth()->user()->usertype == "Admin")
        {
            return view('/admin');
        }
        elseif (Auth()->user()->usertype == "Student")
        {
            return view('/home');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $req)
    {
        $input = $req->all();
        $this->validate($req,[
            'email'=>'required|email',
            'password'=> 'required'
        ]);

        if(Auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password'])))
        {

            if(auth()->user()->usertype == "Admin"){
                return redirect('/admin');
            }
            elseif(auth()->user()->usertype == "Student"){
                return redirect('/home');
            }

        }else{
            return redirect()->route('login')->with('error','Email and password do not match');
        }

    }

}
