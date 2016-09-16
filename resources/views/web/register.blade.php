@extends('web.layouts.app')

@section('content')
<div class="registration-form">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Registration
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.html">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
		<h2>Registration</h2>
		<div class="registration-grids">
			<div class="reg-form">
				<div class="reg">
					<p>Welcome, please enter the following details to continue.</p>
					<p>If you have previously registered with us, <a href="{{ url('/login') }}">click here</a></p>
					<form method="POST" action="{{ url('/register') }}">
					{{ csrf_field() }}
					
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<ul>
							<li class="text-info">Name: </li>
							<li><input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
							@if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            </li>
						</ul>
					</div>

					<!-- <ul>
						<li class="text-info">Last Name: </li>
						<li><input type="text" value=""></li>
					</ul> -->

					<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
						<ul>
							<li class="text-info">Username: </li>
							<li><input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" autofocus>
							@if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                            </li>
						</ul>
					</div>

					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">		 
						<ul>
							<li class="text-info">Email: </li>
							<li> <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
							@if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            </li>
						</ul>
					</div>
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<ul>
							<li class="text-info">Password: </li>
							<li><input id="password" type="password" class="form-control" name="password">
							@if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif</li>
						</ul>
					</div>
					<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
						<ul>
							<li class="text-info">Re-enter Password:</li>
							<li> <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
							@if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif</li>
						</ul>
					</div>
					<!-- <ul>
						<li class="text-info">Mobile Number:</li>
						<li><input type="text" value=""></li>
					</ul> -->						
					<input type="submit" value="REGISTER NOW">
					<p class="click">By clicking this button, you are agree to my  <a href="#">Policy Terms and Conditions.</a></p> 
					</form>
				</div>
			</div>
			<div class="reg-right">
				 <h3>Completely Free Account</h3>
				 <div class="strip"></div>
				 <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio 
				 libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
				 <h3 class="lorem">Lorem ipsum dolor.</h3>
				 <div class="strip"></div>
				 <p>Tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- registration-form -->
@endsection