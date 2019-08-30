@extends('master')
@section('content')
<div class="form-group row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10">
    

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create New Role</h2>
                </div>
                <div class="pull-right"><br>
                    <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                </div>
            </div>
        </div>

        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('role_name', null, array('placeholder' => 'Role name','class' => 'form-control')) !!}
                </div>
                @if ($errors->has('role_name'))
                <span class= "error" style="color:red;">{{ $errors->first('role_name'),"" }}</span>
                @endif
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br/>
                    @foreach($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ $value->name }}</label>
                    <br/>
                    @endforeach
                </div>
                @if ($errors->has('permission'))
                <span class= "error" style="color:red;"     >{{ $errors->first('permission'),"" }}</span>
                @endif
            </div>
            <div class="col-xs-06 col-sm-06 col-md-06 text-center">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
            </div>
        </div>
{!! Form::close() !!}

    </div>
</div>
@endsection