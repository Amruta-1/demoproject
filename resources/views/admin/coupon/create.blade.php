@extends('master')

@section('content')
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <h2>Add Coupon</h2>
            <div class="pull-right"><br>
            <a href="{{ url('/admin/coupon') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            </div>
            <br />
            <br />
            
            <form method="POST" action="{{ url('/admin/coupon') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include ('admin.coupon.form', ['formMode' => 'create'])

            </form>

        </div>
    </div>
            
@endsection
