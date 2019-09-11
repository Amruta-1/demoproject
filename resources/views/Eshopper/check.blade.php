@extends('Eshopper.master')

@section('title', 'Dashboard')
@section('content')
<?php
$tot=Session::get('subtotal');
$t1=0;
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<form id="mainform" name="sub"  method="POST" action="{{route('checkout')}}">
 {{ csrf_field() }}
<div class="bs-example">
 
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" style="width:100%;text-align:left;">
                     <div class="register-req" >
					Select Billing address
					</div>
                    </button>									
                </h2>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                <select style="width:50%;height:30px;margin-left:50px;" id="address" name="billingaddress">
               		<option value=''>Select billing address</option>
                    @foreach($addresses as $address)		
					<option  value="{{$address->id}}">

						{{$address->customername}}<span>,</span>
						{{$address->address1}}<span>,</span>
						{{$address->address2}}<span>,</span>
						{{$address->city}}<span>,</span>
						{{$address->zipcode}}<span>,</span>
						{{$address->mobno}}<span>,</span>
						{{$address->state_name}}<span>,</span>
						{{$address->country_name}}
						
					</option>
					@endforeach
				</select>
				
                </div>
                <div class="form-one" style="margin-top: 10px;margin-left:50px;">
				
					<h4>Billing Address</h4>
					<input type="text" placeholder="Name" name="name" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px; width: 540;margin-bottom:10px;" data-parsley-required="true"><br>
					<input type="text" placeholder="Address 1" name="address1" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width:540;margin-bottom:10px;" data-parsley-required="true"><br>
					<input type="text" placeholder="Address 2" name="address2" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;" data-parsley-required="true"><br>
					<input type="text" placeholder="City" name="city" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;" data-parsley-required="true"><br>
					<input type="text" placeholder="Zip Code" name="zipcode" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;" data-parsley-required="true"><br>
					<input type="text" placeholder="Mobile no" name="mobno" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;" data-parsley-required="true"><br>
					<div class="selected" style="display:none;">
					<input type="text" placeholder="State" name="textstate" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;" data-parsley-required="true"><br>
					<input type="text" placeholder="Country" name="textcountry" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;" data-parsley-required="true">
					</div>
					
					<div class="optionnotselected">
					<select id="country" style="margin-bottom:10px;height:35px;" name="country">
					<option>Select Country</option>
					@foreach($country as $countries)
					<option value="{{$countries->id}}">{{$countries->country_name}}</option>
					@endforeach
					</select>
					

					<select id="state" style="margin-bottom:10px;height:35px;" name="state">
					<option value=" "> </option>
					</select>
					</div>

					<br>
					<label><input type="checkbox" id="ShippingToBillAddress"> Shipping to bill address</label><br>
					
					<br>
					</div>
           		</div>
        </div>
            <div class="card">
            <div class="card-header" id="headingtwo">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsetwo" style="width:100%;text-align:left;">
                     <div class="register-req" >
					Select Shipping address
					</div>
                    </button>									
                </h2>
            </div>
            <div id="collapsetwo" class="collapse" aria-labelledby="headingtwo" data-parent="#accordionExample">
                <div class="card-body">
                <select style="width:50%;height:30px;margin-left:50px;" id="shippingaddress" name="shippingaddress">
               		<option value=''>Select shipping address</option>
                    @foreach($addresses as $address)		
					<option  value="{{$address->id}}">

						{{$address->customername}}<span>,</span>
						{{$address->address1}}<span>,</span>
						{{$address->address2}}<span>,</span>
						{{$address->city}}<span>,</span>
						{{$address->zipcode}}<span>,</span>
						{{$address->mobno}}<span>,</span>
						{{$address->state_name}}<span>,</span>
						{{$address->country_name}}
						
					</option>
					@endforeach
				</select>
				
                </div>
                <div class="form-one" style="margin-top: 10px;margin-left:50px;">
				
					<h4>Shipping Address</h4>
					<input type="text" placeholder="Name" name="sname" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px; width: 540;margin-bottom:10px;" data-parsley-required="true"><br>
					<input type="text" placeholder="Address 1" name="saddress1" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width:540;margin-bottom:10px;" data-parsley-required="true"><br>
					<input type="text" placeholder="Address 2" name="saddress2" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;" data-parsley-required="true"><br>
					<input type="text" placeholder="City" name="scity" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;" data-parsley-required="true"><br>
					<input type="text" placeholder="Zip Code" name="szipcode" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;" data-parsley-required="true"><br>
					<input type="text" placeholder="Mobile no" name="smobno" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;" data-parsley-required="true"><br>
					<div class="shippingoptionselected" style="display:none;">
					<input type="text" placeholder="State" name="textsstate" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;" data-parsley-required="true"><br>
					<input type="text" placeholder="Country" name="textscountry" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;" data-parsley-required="true">
					</div>
					<div class="shippingoptionnotselected">
					<select id="scountry" style="margin-bottom:10px;height:35px;" name="scountry">
					<option>Select Country</option>
					@foreach($country as $countries)
					<option value="{{$countries->id}}">{{$countries->country_name}}</option>
					@endforeach
					</select>
					

					<select id="sstate" style="margin-bottom:10px;height:35px;" name="sstate">
					<option value=" "></option>
					</select>
					</div>
				
				</div>

            </div>
            
        </div>
         <div class="card">
            <div class="card-header" id="headingtwo">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsethree" style="width:100%;text-align:left;">
                     <div class="register-req" >
					 Shipping Charges
					</div>
                    </button>									
                </h2>
            </div>
            <div id="collapsethree" class="collapse" aria-labelledby="headingtwo" data-parent="#accordionExample">
                <div class="card-body">
                @if($tot >= 500)
                <p style="margin-left:50px;">Free shipping</p>
				<input type="checkbox" name="" value="" style="margin-left:50px;" checked disabled> Free
				@elseif($tot <= 500)
				 <p style="margin-left:50px;">As the the order size is less than 500 so you need to pay the shipping charge of 50RS.</p>
				<input type="checkbox" name="" value="" style="margin-left:50px;" checked disabled>50RS.
				@endif 
                </div>
                <div class="form-one" style="margin-top: 10px;margin-left:50px;">
				</div>

            </div>
            
        </div>
       
       
        <div class="card">
            <div class="card-header" id="headingtwo">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsefive" style="width:100%;text-align:left;">
                     <div class="register-req" >
					 Order Preview
					</div>
                    </button>									
                </h2>
            </div>
            <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordionExample">
                <div class="card-body">               
				<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>

						<tr class="cart_menu" style="margin-left:50px;">
							<td class="image" ></td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					
					@foreach(Cart::content() as $row)
					
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{asset('product/'.$row->options->img)}}" alt="" height="110px" width="100px"/></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>{{ $row->name }}</p>
							</td>
							<td class="cart_price">
								<p>{{$row->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{url('incrementQuantity/'.$row->rowId.'/'.$row->qty)}}" > + </a>
									<input class="cart_quantity_input" type="text" name="quantity" id="quantity" value="{{$row->qty}}" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="{{url('decrementQuantity/'.$row->rowId.'/'.$row->qty)}}"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$row->price*$row->qty}}</p>
								<span hidden>{{$t1=$t1+$row->price*$row->qty}}</span>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{asset('removeproduct/'.$row->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>	
					@endforeach
						
					</tbody>
				</table>
				<div class="col-sm-6"></div>
				<div class="col-sm-6">
					
					<div class="total_area">
						<ul>

							
							<label>Cart sub total</label>
							<input type="text"  name="subtotal" value="{{$t1}} " style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;">
							{{Session::put('subtotal',$t1)}}
							@if($t1>500)
							<label>Shipping Cost</label>
							<input type="text"  name="shippingcharge" value="0" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;">
							
							@else
							<label>Shipping Cost</label>
							<input type="text"  name="shippingcharge" value="50" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;">
							@endif
							@if($t1>500)
							<label>Total</label>
							<input type="text" placeholder="total" name="total" value="{{$t1}}" style="background-color: #F0F0E9;border: none;height: 40px;padding-left: 10px;width: 540;margin-bottom:10px;">
							
							@else
							<label>Total</label>
							<input type="text" placeholder="total" name="total" value="{{$t1+50}}" >
							
							@endif
						</ul>

							
							
					</div>
					</form>
			</div>
				</div>
                </div>
               
            </div>
             <div class="card">
            <div class="card-header" id="headingtwo">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsefour" style="width:100%;text-align:left;">
                     <div class="register-req" >
					 Payment Method
					</div>
                    </button>									
                </h2>
            </div>
            <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordionExample">
                <div class="card-body">               
				<input type="radio" name="payment" value="COD" id="COD" style="margin-left:50px;" checked>Cash on Delivery
				<input type="radio" name="payment" value="paypal" id="paypal" style="margin-left:50px;" >Paypal<br>
				
				<div id="CODbutton">
				<input type="submit" class="btn btn-primary btn-sm" style="margin-left:50px;margin-bottom:10px;" name="sub" value="Place order" id="button"><br>
				</div>
				
				<div id="paypalbutton" style="display:none">
				<button class="btn btn-primary btn-sm"  formaction="{{route('addmoney.paypal')}}" id="formButton" name="submit" style="margin-left:50px;margin-bottom:10px;" formmethod="POST">Place Order  with paypal</button><br>
				</div>
                </div>
                <br>
            </div>
            
        </div>
        </div>
    </div>
    </form>
</div>

<script type="text/javascript">
$('input[name="payment"]').on('click change', function(e) {

    $('#CODbutton').hide();
    $('#paypalbutton').show();
});

   $('#address').on('change', function(e){
   	$('.optionnotselected').hide();
   	$('.selected').show();
    var add_id = $(this).children("option:selected").val();
    // alert(add_id);
      if (add_id == ''){

    		$('input[name="name"]').val('');
           	 $('input[name="address1"]').val('');
           	 $('input[name="address2"]').val('');
           	 $('input[name="city"]').val('');
           	 $('input[name="zipcode"]').val('');
           	 $('input[name="mobno"]').val('');
   	 		 $('input[name="textstate"]').val('');
           	 $('input[name="textcountry"]').val('');
			
		}
		else{
       $.get('/address-dropdown?add_id=' + add_id, function(data){
           // console.log(data);
           //success data
           $.each(data, function(index, addressObj){
          	
           	 $('input[name="name"]').val(addressObj.customername).attr("disabled", true);
           	 $('input[name="address1"]').val(addressObj.address1).attr("disabled", true);
           	 $('input[name="address2"]').val(addressObj.address2).attr("disabled", true);
           	 $('input[name="city"]').val(addressObj.city).attr("disabled", true);
           	 $('input[name="zipcode"]').val(addressObj.zipcode).attr("disabled", true);
           	 $('input[name="mobno"]').val(addressObj.mobno).attr("disabled", true);
           	 $('input[name="textstate"]').val(addressObj.state_name).attr("disabled", true);
           	 $('input[name="textcountry"]').val(addressObj.country_name).attr("disabled", true);
              
           });

       });
		}
   });
   $('#shippingaddress').on('change', function(e){

    var add_id = $(this).children("option:selected").val();
     //alert(add_id);
     $('.shippingoptionnotselected').hide();
	 $('.shippingoptionselected').show();
    
      if (add_id == '') {
    		$('input[name="sname"]').val('');
           	 $('input[name="saddress1"]').val('');
           	 $('input[name="saddress2"]').val('');
           	 $('input[name="scity"]').val('');
           	 $('input[name="szipcode"]').val('');
           	 $('input[name="smobno"]').val('');
           	 $('input[name="textsstate"]').val('');
           	 $('input[name="textscountry"]').val('');
    		
		}
		else{

       $.get('/address-dropdown?add+id=' + add_id, function(data){
            
           //success data
           $.each(data, function(index, addressObj){
           	 $('input[name="sname"]').val(addressObj.customername).attr("disabled", true);
           	 $('input[name="saddress1"]').val(addressObj.address1).attr("disabled", true);
           	 $('input[name="saddress2"]').val(addressObj.address2).attr("disabled", true);
           	 $('input[name="scity"]').val(addressObj.city).attr("disabled", true);
           	 $('input[name="szipcode"]').val(addressObj.zipcode).attr("disabled", true);
           	 $('input[name="smobno"]').val(addressObj.mobno).attr("disabled", true);
           	 $('input[name="textsstate"]').val(addressObj.state_name).attr("disabled", true);
           	 $('input[name="textscountry"]').val(addressObj.country_name).attr("disabled", true);
              
           });

       });
		}
   });
   $("#ShippingToBillAddress").click(function(){
  var add_id = $('#address').children("option:selected").val();
     //alert(add_id);
    $('.shippingoptionnotselected').hide();
 	$('.shippingoptionselected').show();
    

       $.get('/address-dropdown?add+id=' + add_id, function(data){
            
           //success data
           $.each(data, function(index, addressObj){
           	 $('input[name="sname"]').val(addressObj.customername).attr("disabled", true);
           	 $('input[name="saddress1"]').val(addressObj.address1).attr("disabled", true).attr("disabled", true);
           	 $('input[name="saddress2"]').val(addressObj.address2).attr("disabled", true).attr("disabled", true);
           	 $('input[name="scity"]').val(addressObj.city).attr("disabled", true);
           	 $('input[name="szipcode"]').val(addressObj.zipcode).attr("disabled", true);
           	 $('input[name="smobno"]').val(addressObj.mobno).attr("disabled", true); 
           	 $('input[name="textsstate"]').val(addressObj.state_name).attr("disabled", true);
           	 $('input[name="textscountry"]').val(addressObj.country_name).attr("disabled", true);
           });

       });
});


 $('#country').on('change', function(e){

    var cat_id = e.target.value;
    
       console.log(cat_id);

       $.get('/country-dropdown?cat_id=' + cat_id, function(data){
            
           
           $('#state').empty();

           $.each(data, function(index, stateObj){
            
              $('#state').append('<option value="'+ stateObj.id +'">'+ stateObj.state_name+'</option>'); 

            });
       });
   });
 $('#scountry').on('change', function(e){

    var cat_id = e.target.value;
    
       console.log(cat_id);

       $.get('/country-dropdown?cat_id=' + cat_id, function(data){
            
           
           $('#sstate').empty();

           $.each(data, function(index, stateObj){
            
              $('#sstate').append('<option value="'+ stateObj.id +'">'+ stateObj.state_name+'</option>'); 
            });
       });
   });
 
</script>

@endsection