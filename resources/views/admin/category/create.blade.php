@extends('master')

@section('content')

<div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            
                        <a href="{{ url('/admin/category') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        <form method="POST" action="{{ url('/admin/category') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.category.form', ['formMode' => 'create'])

                        </form>

        </div>
    </div>
            
@endsection
