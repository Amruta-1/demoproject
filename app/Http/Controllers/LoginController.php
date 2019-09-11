<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\UserDetails;
use Auth;

class LoginController extends Controller
{
    //
     public function show(){
    	
         return view('login');

     }
     public function showLoginForm()
    {
        return view('auth.login');
        
    }
     public function showRegister(){
        
         return view('register1');

     }
    public function showregister1(){
    	
      
       // $request->validate([
       
       //      'full_name' => 'required',
       //      'email' => 'required',
       //      'password' => 'required',
       //      'retype_password' => 'required'

       //  ]);
        
        //return Redirect::back();
    }
    //  public function authenticate(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         // Authentication passed...
    //         return redirect()->intended('dashboard');
    //     }
    // }
    
       
       
     
}
