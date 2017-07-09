<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Admin;

class AdminLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin',['except'=>['handleLogout']]);
    }
    public function showLogin(){
        return view('auth.adminlogin');
    }

    public function handleLogin(Request $request){
        //validate input
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);

        $user = Admin::find(2);
        //Attempt
        if(password_verify($request->password,$user->password)){
            if(Auth::guard('admin')->attempt([
                'email'=>$request->email,
                'password'=>$request->password,
            ],$request->remember)){
                return redirect()->intended(route('admin.home'));
            }
        }
        else{
            return redirect()->back()->withInput($request->only('email','remember'));
        }

    }

    public function handleLogout(){
        if(Auth::guard('admin')){
            Auth::guard('admin')->logout();
            return redirect(route('admin.login'));
        }
    }

    
}
