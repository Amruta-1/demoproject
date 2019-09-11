@extends('Eshopper.master')

@section('title', 'Dashboard')
@section('content')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<div class="bs-example">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">
                     <div class="register-req">
					Select Billing address
					</div>
                    </button>									
                </h2>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                <select>
                    @foreach($addresses as $address)		
					<option>
						{{$address->customername}}<span>,</span>
						{{$address->address1}}<span>,</span>
						{{$address->address2}}<span>,</span>
						{{$address->city}}<span>,</span>
						{{$address->zipcode}}<span>,</span>
						{{$address->mobno}}
					</option>
					@endforeach
				</Select>
                </div>
            </div>
        </div>
       
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree">Select Shipping address</button>                     
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection