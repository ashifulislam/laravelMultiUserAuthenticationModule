<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AgentLoginController extends Controller
{
    //Need to make a constructor
    public function __construct()
    {
        $this->middleware('guest:agent');
    }

    //show you view page
    public function showLogin(){
        return view('auth.agent-login');
    }
    //perform login here
    public function login(Request $request){
        //validation part
        $this->validate($request,[
           'email'=>'required|email',
            'password'=>'required|min:8'
        ]);
        //need to match your user's credentials
        if(Auth::guard('agent')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect()->intended(route('agent.dashboard'));
        }
        return redirect()->back()->withInupt($request->only('email','remember'));
    }
}
