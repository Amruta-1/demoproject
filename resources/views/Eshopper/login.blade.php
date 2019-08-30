@extends('Eshopper.master')

@section('title', 'login')
@section('content')

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
			
			
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{ route('Userlogin') }}" method="post" >
						{{ csrf_field() }}
							
					      	
						      	
					    	
					    	<a href="{{ url('auth/google')  }}" class="btn btn-google"><i class="fa fa-google"></i> Google</a>
					    	
							<input type="email" placeholder="Email Address" name="email_Address"/>
							{!! $errors->first('email_Address', '<p class="help-block" style="color:red;">:message</p>') !!}


								<input type="password" placeholder="Password" name="Password"/>
							{!! $errors->first('Password', '<p class="help-block" style="color:red;">:message</p>') !!}
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							
							<button type="submit" class="btn btn-default">Login</button>
							<a href="{{ route('reset-password')}}">Forgot Password?</a>
						</form>
						<form action="">
						
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{ route('UserRegistration') }}" method="post">
						{{ csrf_field() }}
							<div class="row">
						      	<div class="col-sm-6">
							      	<input type="text" placeholder="First name" name="first_name"/>
									{!! $errors->first('first_name', '<p class="help-block" style="color:red;">:message</p>') !!}
								</div>
						      	<div class="col-sm-6">
							      	<input type="text" placeholder="Last name" name="last_name"/>
									{!! $errors->first('last_name', '<p class="help-block" style="color:red;">:message</p>') !!}
						      	</div>
					    	</div>
							
							
							<input type="email" placeholder="Email Address" name="email" />
							{!! $errors->first('email', '<p class="help-block" style="color:red;">:message</p>') !!}
							<input type="password" placeholder="Password" name="password" />
							{!! $errors->first('password', '<p class="help-block" style="color:red;">:message</p>') !!}
							<button type="submit" class="btn btn-default">Signup</button>

						</form>
					</div><!--/sign up form-->
				</div>
				</form>
			</div>
		</div>
</section>

@endsection