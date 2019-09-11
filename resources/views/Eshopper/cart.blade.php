@extends('Eshopper.master')

@section('title', 'Dashboard')
@section('content')
<?php
$tot=Session::get('total');
$t1=0;

?>
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>

						<tr class="cart_menu">
							<td class="image">Item</td>
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
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
				<form id="form" action="{{ route('coupon') }}" data-parsley-validate>
				{{ csrf_field() }}
				<h5 >Apply coupon</h5>
				<input type="text" placeholder="Enter Coupon code" name="coupon" style="background-color:#E6E4DF;border:none;width:300px;height:30px;padding-left:10px;" data-parsley-required="true"/><br>
				@if ($message = Session::get('error'))
				{{$message}}
				@endif
				<button type="submit" class="btn btn-default update" >Apply coupon</button>
				</form>
				</div>
				<div class="col-sm-6">
					<form id="form" action="{{ route('checkOut') }}" data-parsley-validate>
					<div class="total_area">
						<ul>

							<li>Cart Sub Total<span>{{$t1}} Rs</span></li>
							{{Session::put('subtotal',$t1)}}
							@if($t1>500)
							<li>Shipping Cost <span>0</span></li>
							@else
							<li>Shipping Cost <span>50 RS</span></li>
							
							@endif
							@if($t1>500)
							<li>Total <span>{{$t1}} RS</span></li>
							@else
							<li>Total <span>{{$t1+50}} RS</span></li>
							
							@endif
							
						</ul>

							<a href="{{url('checkOut')}}" class="btn btn-default check_out">Check Out</a>
							
					</div>
					</form>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	<script>
 	$('#form').parsley();
	</script>
	@endsection