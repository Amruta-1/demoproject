<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;

use Illuminate\Support\Facades\Input;

/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\order_details;
use Cart;
use Auth;

class PayPalController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //parent::__construct();
        
        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal()
    {

    	return view('Eshopper.paypalresponse');

      
    }
    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {	
    	 //dd(request()->all());
    	$add_id= $request->input('billingaddress');
    	//dd($add_id);
    	$shipping_add_id= $request->input('shippingaddress');
    	//dd($shipping_add_id);
	 	$paymentmd = $request->payment;

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

    	$order = new order_details;
        $order->cart = cart::content(Auth::user()->id);
        $order->shipping_address_id= $shipping_address_id;
        $order->billing_address_id= $billing_add_id;
        $order->cart_total= Cart::subTotal();//$request->input('total');
        $order->shipping_charge= $request->input('shippingcharge');
        $order->grand_total= $request->input('total');
        $order->status="pending";
        $order->customer_id= Auth::user()->id;
        $order->save();
        $cart_id= $order->id;
        Session::put('cart_id',$cart_id);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1') /** item name **/
            ->setCurrency('INR')
            ->setQuantity(1)
            ->setPrice($request->get('total')); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('INR')
            ->setTotal($request->get('total'));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('payment.status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('addmoney.paywithpaypal');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('addmoney.paywithpaypal');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error','Unknown error occurred');
        return Redirect::route('addmoney.paywithpaypal');
    }
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('addmoney.paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        //dd($result);exit; 
        if ($result->getState() == 'approved') { 
        	$c_id= Session::get('cart_id');
        	order_details::where('id', $c_id)->update(
          	['transaction_id' =>$result->id,
          	'status' => "processing"]);
            

            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/

            \Session::put('success','Payment success');
            return Redirect::route('addmoney.paywithpaypal');
        }
        \Session::put('error','Payment failed');
        return Redirect::route('addmoney.paywithpaypal');
    }
}

