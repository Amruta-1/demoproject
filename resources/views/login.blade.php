@extends('layouts.app')

@section('title', 'Login page')

@section('content')
<div class="hold-transition login-page">
	<div class="login-box">
	  <div class="login-logo">
	    <a href="../../index2.html"><b>Admin</b>LTE</a>
	  </div>
	  <!-- /.login-logo -->
	  <div class="login-box-body">
	    <p class="login-box-msg">Sign in to start your session</p>

	    <form action="{{ route('login') }}" method="post">
	    {{csrf_field()}}
	      <div class="form-group has-feedback">
	        {{ Form::label('email', 'Email')}}
			{{ Form::text('email','',['class' => 'form-control'])}}
	        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	      </div>
	      @if ($errors->has('email'))
			<span class="error">{{ $errors->first('email'),"" }}</span>
		  @endif
	      <div class="form-group has-feedback">
	        {{ Form::label('passwordlabel', 'Password')}}
			{{ Form::password('password',['class' => 'form-control'])}}
	        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	      </div>
	      @if ($errors->has('password'))
			<span class="error">{{ $errors->first('password'),"" }}</span>
		  @endif
	      <div class="row">
	        <div class="col-xs-8">
	          <div class="checkbox icheck">
	            <label style="padding-left: 20px;">
	              <input type="checkbox"> Remember Me
	            </label>
	          </div>
	        </div>
	        <!-- /.col -->
	        <div class="col-xs-4">
	          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
	        </div>
	        <!-- /.col -->
	      </div>
	    </form>
	    <a href="#">I forgot my password</a><br>
    	<a href="{{ route('register1')}}" class="text-center">Register a new membership</a>
	    
	    <!-- /.social-auth-links -->

	    <!-- <a href="#">I forgot my password</a><br>
	    <a href="register.html" class="text-center">Register a new membership</a> -->
	    <br>
	  </div>
	  <!-- /.login-box-body -->
	</div>
	<!-- /.login-box --><br>
</div>	
@endsection

@section('checkboxscripts')

<!-- jQuery 3 -->
	<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
	<!-- iCheck -->
	<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
	<script>
	  $(function () {
	    $('input').iCheck({
	      checkboxClass: 'icheckbox_square-blue',
	      radioClass: 'iradio_square-blue',
	      increaseArea: '20%' /* optional */
	    });
	  });
	</script>

@endsection