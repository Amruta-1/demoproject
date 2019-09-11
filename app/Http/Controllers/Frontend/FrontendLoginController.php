<?php

namespace App\Http\Controllers\Frontend;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Category;
use App\Product;
use App\ProductImage;
use App\Coupon;
use App\address;
use DB;
use Cart;
use Session;

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
        $product = DB::table('categories')
                    ->join('product_category', 'product_category.category_id', '=', 'categories.id')
                    ->join('product', 'product.id', '=', 'product_category.product_id')
                    ->join('product_img', 'product_img.product_id', '=', 'product.id')
                    ->get();
        return view('Eshopper.productinfo', compact('product','category','categories','subcategory'));

    }
    public function product(Request $request)
    {   

        $category = Category::where('parent_id','0')->get();
        $categories = Category::with('parent')->get();
        $subcategory = DB::table('categories')->get();
        $id = $request->id; 
        $product = DB::table('categories')
                    ->join('product_category', 'product_category.category_id', '=', 'categories.id')
                    ->join('product', 'product.id', '=', 'product_category.product_id')
                    ->join('product_img', 'product_img.product_id', '=', 'product.id')
                    ->where('categories.id', '=', $id)
                    ->get();
        //dd($product);
        return view('Eshopper.productinfo', compact('product','category','categories','subcategory'));

    }
    
    public function cartStore(Request $request)
    {   
        $q=1;
        $id = $request->id;
        $product= Product::find($id);
        $product_img = DB::table('product_img')->where('product_id', $id)->first();
        //dd($product_img);
        foreach(Cart::content() as $row){
            if($row->id == $id){

                $price= $row->price+$product->product_price;
               
                
               
                Cart::update($row->rowId,['price'=>$price]);
                //dd('existing product');
            }
            else{
                 goto xyz;
            } 
         }
        xyz:{ $cartitem=Cart::add(['id' => $id, 'name' => $product->product_name, 'qty' => 1, 'price' =>$product->product_price, 'options' => ['img' => $product_img->product_img]]);
                 //dd('new product');
            
            }
        return redirect('productinfo');

    }

    public function removeproduct(Request $request)
    {   

        $rowId = $request->rowid;
        Cart::remove($rowId);
        return view('Eshopper.cart');

    }
    public function incrementQuantity(Request $request)
    {   $price=0;
        $rowId = $request->rowid;
        $rowQty = $request->rowqty+1;
        //dd($rowId);
         
               
                
        $cart = Cart::update($rowId,['qty' => $rowQty]);
        //dd($cart);
        return view('Eshopper.cart');

    }
     public function decrementQuantity(Request $request)
    {   
        $rowId = $request->rowid;
        $rowQty = $request->rowqty;
        //dd($rowId);
        if($rowQty >1){
        $rowQty= $rowQty-1;
     
        $cart = Cart::updateCartToMinus($rowId,['qty' => $rowQty ]);
        //dd($cart);
        }
        return view('Eshopper.cart');

    }
    public function total()
    {   $total=0;
      foreach(Cart::content() as $row){
            $total=$total+$row->qty*$row->price;
        }
        //dd($total);
        Session::put('total',$total);
        return view('Eshopper.cart');
 

    }
    public function couponDiscount(Request $request)
    {  
        if (Auth::guest()){
            return view('Eshopper.login');
        }
        else{

        $total=0;
         $this->validate($request, [
            'coupon' => 'required'
           
        ]);
         foreach(Cart::content() as $row){
            $total=$total+$row->qty*$row->price;
        }
        //dd($total);
         $code= $request->input('coupon');
         $coupon = DB::table('coupons')->where('code', $code)->first();
         $customer_id= Auth::user()->id;

         if($coupon!= null){

            $type= $coupon->type;
            $discount=$coupon->discount;
            if($type=='Percent'){
                
                $dis=$discount*$total/100;
                $total= $total-$dis;
            }
            else{
                $discount=$coupon->discount;
                $total=$total-$discount;

            }
            Session::put('total',$total);
         }
         else{

            return back()->with('error','Invalid coupon code!');
         }

        return view('Eshopper.cart');
        
    }

    }

    // public function checkout()
    // {
    //     if (Auth::guest()){
    //         return view('Eshopper.login');
    //     }
    //     else{

    //         $id= Auth::user()->id;
    //         $addresses = DB::table('addresses')->where('customer_id',$id)->get();
    //         //dd($addresses);
    //         return view('Eshopper.checkout',compact('addresses'));
    //     }

    // }
    public function check()
    {
        if (Auth::guest()){
            return view('Eshopper.login');
        }
        else{

            $id= Auth::user()->id;
            //$addresses = DB::table('addresses')->where('customer_id',$id)->get();
            $addresses = DB::table('addresses')
                        ->leftJoin('country', 'country.id', '=', 'addresses.countryID')
                        ->leftJoin('states', 'states.id', '=', 'addresses.stateID')
                        ->select('addresses.*','country.country_name','states.state_name')
                        ->where('customer_id',$id)
                        ->get();
                        
            $state = DB::table('states')->get();
            $country = DB::table('country')->get();


            //dd($addresses);
            return view('Eshopper.check',compact('addresses','state','country'));
        }

    }
   
}

