<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectTo(){
        switch (Auth::user()->role()){
            case 2:
                $this->redirectTo='/admin';
                break;
            case 4:
                $this->redirectTo='/team';
                break;
            case 3:
                $this->redirectTo='/player';
                break;
            case 5:
                $this->redirectTo='/academic';
                break;
            case 6:
                $this->redirectTo='/scout';
                break;
            case 1:
                $this->redirectTo='/superAdmin';
            default:
                $this->redirectTo='/login';

        }
    }
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

}
