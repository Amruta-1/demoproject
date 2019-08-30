
@extends('master')

@section('title', 'Registration page')

@section('content')
	  
	<div class="form-group row">
  		<div class="col-sm-2"></div>
  		<div class="col-sm-10">
	    <h2>Create user</h2>

	   {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
	    {{csrf_field()}}
	      <div class="form-group has-feedback">
	        {{ Form::label('first_namelabel', 'First Name')}}
			{{ Form::text('first_name','',['class' => 'form-control'])}}
	      </div>
	      @if ($errors->has('first_name'))
			<span class="error" style="color:red;">{{ $errors->first('first_name'),"" }}</span>
		  @endif
	      <div class="form-group has-feedback">
	        {{ Form::label('last_namelabel', 'Last Name')}}
			{{ Form::text('last_name','',['class' => 'form-control'])}}
	        </span>
	      </div>
	      @if ($errors->has('last_name'))
			<span class="error" style="color:red;">{{ $errors->first('last_name'),"" }}</span>
		  @endif
		  <div class="form-group has-feedback">
	        {{ Form::label('email', 'Email')}}
			{{ Form::email('email','',['class' => 'form-control'])}}
	        </span>
	      </div>
	      @if ($errors->has('email'))
			<span class="error" style="color:red;">{{ $errors->first('email'),"" }}</span>
		  @endif
		  <div class="form-group has-feedback">
	        {{ Form::label('password', 'Password')}}
			{{ Form::password('password',['class' => 'form-control'])}}
	        </span>
	      </div>
	      @if ($errors->has('password'))
			<span class="error" style="color:red;">{{ $errors->first('password'),"" }}</span>
		  @endif
		  <div class="form-group has-feedback">
	        {{ Form::label('confirm_password', ' Confirm Password')}}
			{{ Form::password('confirm_password',['class' => 'form-control'])}}
	        </span>
	      </div>
	      @if ($errors->has('confirm_password'))
			<span class="error" style="color:red;">{{ $errors->first('confirm_password'),"" }}</span>
		  @endif
		     <div class="form-group ">
		 	{{ Form::label('Status', 'Status:')}}
		 	{{ Form::label('active_lbl', 'Active')}}
		 	{{ Form::radio('result', '1' , 1) }}
		 	{{ Form::label('inactive_lbl', 'Inactive')}}
  			{{ Form::radio('result', '0' , 0) }}
  			
		</div>
		  <div class="form-group has-feedback">
		 	 {{ Form::label('roles', 'Select Role')}}
	
  		{!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
		</div>
	      <div class="row">
	      	
	        <div class="col-xs-2">
	          <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>

	        </div>
	       <div class="col-xs-10"></div>
	       
	       </div>
	    {!! Form::close() !!}
	  </div>
	    
	    
	    <br>
	  
	<br>
	
@endsection

