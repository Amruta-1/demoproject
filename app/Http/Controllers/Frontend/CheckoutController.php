<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\address;
use App\order_details;
use Auth;
use Cart;
use Redirect;
use App\wishlist;


class CheckoutController extends Controller
{
   
     public function checkout(Request $request)
     {   
    	$add_id= $request->input('billingaddress');
    	//dd($add_id);
    	$shipping_add_id= $request->input('shippingaddress');
    	//dd($shipping_add_id);
	 	$paymentmd = $request->payment;

       if($paymentmd =="COD"){
	 
    	if($add_id == null){
	 		$address= new address;
	 		$address->customername=$request->input('name');
	 		$address->address1=$request->input('address1');
			$address->address2=$request->input('address2');
	 		$address->city=$request->input('city');
	 		$address->mobno=$request->input('mobno');
	 		$address->zipcode=$request->input('zipcode');
	 		$address->stateID=$request->input('state');
	 		$address->countryID=$request->input('country');
	 		$address->customer_id=Auth::user()->id;
	 		$address->address_type= "billing";
	 		$address->save();

	 		$billing_add_id= $address->id;
	 		//dd($billing_add_id);

	 		if($shipping_add_id == null){

		 		$address = new address;
		 		$address->customername=$request->input('sname');
		 		$address->address1=$request->input('saddress1');
				$address->address2=$request->input('saddress2');
		 		$address->city=$request->input('scity');
		 		$address->mobno=$request->input('smobno');
		 		$address->zipcode=$request->input('szipcode');
		 		$address->stateID=$request->input('sstate');
		 		$address->countryID=$request->input('scountry');
		 		$address->customer_id=Auth::user()->id;
		 		$address->address_type= "shipping";
		 		$address->save();
		 		$shipping_address_id= $address->id;
	 		}
	 		else{
	 			$shipping_address_id= $shipping_add_id;

	 		}

	 	}
	 	else{

	 		$billing_add_id=$add_id;
	 		if($shipping_add_id == null){

		 		$saddress = new address;
		 		$saddress->customername=$request->input('sname');
		 		$saddress->address1=$request->input('saddress1');
				$saddress->address2=$request->input('saddress2');
		 		$saddress->city=$request->input('scity');
		 		$saddress->mobno=$request->input('smobno');
		 		$saddress->zipcode=$request->input('szipcode');
		 		$saddress->stateID=$request->input('sstate');
		 		$saddress->countryID=$request->input('scountry');
		 		$saddress->customer_id=Auth::user()->id;
		 		$saddress->address_type= "shipping";
		 		$saddress->save();
		 		$shipping_address_id= $address->id;
	 		}
	 		else{
	 			$shipping_address_id= $shipping_add_id;

	 		}
	 	}
	 	$string = str_random(15);
        $order = new order_details;
        $order->cart = cart::content(Auth::user()->id);
        $order->shipping_address_id= $shipping_address_id;
        $order->billing_address_id= $billing_add_id;
        $order->cart_total= Cart::subTotal();//$request->input('total');
        $order->shipping_charge= $request->input('shippingcharge');
        $order->grand_total= $request->input('total');
        $order->status= "pending";
        $order->transaction_id= "PAYID-".$string;
        $order->customer_id= Auth::user()->id;
        $order->save();

	
       	return view('Eshopper.success');

       }


    }
    public function wishlist(Request $request){
    	$prod_id=$request->id;
    	$wishlist= new wishlist;
    	$wishlist->customer_id= Auth::user()->id;
    	$wishlist->product_id= $prod_id;
    	$wishlist->save();
    

    }
}
