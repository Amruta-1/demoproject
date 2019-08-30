@extends('master')

@section('content')
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <div class="pull-left">
            <h2>Edit Configuration </h2>
            </div>
            <br>
            <div class="pull-right">
                <a href="{{ url('/admin/configurations') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            </div>
            <br>
            <br>

           
            <br>
            <form method="POST" action="{{ url('/admin/configurations/' . $configuration->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                @include ('admin.configurations.form', ['formMode' => 'edit'])

            </form>

        </div>
    </div>
       


            
@endsection
