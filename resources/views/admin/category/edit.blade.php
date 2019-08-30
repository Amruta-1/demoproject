@extends('master    ')

@section('content')
  
    <div class="form-group row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
        <div class="pull-left">
        <h2>Edit Category</h2>
        </div>
        <br>
                        <div class="pull-right">
                        <a href="{{ url('/admin/category') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a></div>
                        <br />
                        <br />
                        
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <br>
                        <form method="POST" action="{{ url('/admin/category/' . $category->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.category.form', ['formMode' => 'edit'])

                        </form>
    </div>
                    
    </div>


@endsection
