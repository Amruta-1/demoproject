<?php

namespace App\Http\Controllers\Frontend;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Category;
use DB;

class FrontendLoginController extends Controller
{
    //
    public function login(Request $request)
    {   
        $this->validate($request, [
            
            
            'email_Address' => 'required',
            'Password' => 'required',

            
        ]);
        $user_data = array(
	      'email'  => $request->get('email_Address'),
	      
	      'password' => $request->get('Password')
     	);

	    if(Auth::attempt($user_data))
	    {
	     return redirect('product-details');
	    }
	    else
	    {
	     return back()->with('error', 'Wrong Login Details');
	    }


    }
    public function logout(Request $request) {
            Auth::logout();
            return redirect('/Eshopperlogin');
    }
    public function store(Request $request)
    {   
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required'
            
        ]);

        $requestData = $request->all();
        $user= User::create($requestData);
        $user->assignRole('customer'); 

        return redirect()->route('home')
        	                ->with('success','User created successfully');

    }
    public function categories()
    {
        $category = Category::where('parent_id','0')->get();
        $categories = Category::with('parent')->get();
        $subcategory = DB::table('categories')->get();

        return view('Eshopper.productinfo', compact('category','categories','subcategory'));

    }
    
   
}

