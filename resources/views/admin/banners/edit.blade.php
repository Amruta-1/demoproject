@extends('master')

@section('content')
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">

                        <h3 style="text-align:center;">Edit Banners</h3>
                        <a href="{{ url('/admin/banners') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/banners/' . $banner->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.banners.form', ['formMode' => 'edit'])

                        </form>

        </div>
    </div>
           
        
   
@endsection
