@extends('master')

@section('content')
    <div class="form-group row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <div class="pull-left">
        <h3> EditCoupons </h3>
        </div>
        <br>
                         <div class="pull-right">
                        <a href="{{ url('/admin/coupon') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a></div>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/coupon/' . $coupon->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.coupon.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            
@endsection
