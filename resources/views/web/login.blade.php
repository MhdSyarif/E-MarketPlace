@extends('web.layouts.app')

@section('content')
		<!-- content-section-starts -->
	<div class="content">
	<div class="container">
		<div class="login-page">
		    <div class="dreamcrub">
			   	<ul class="breadcrumbs">
	                <li class="home">
	                   <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
	                   <span>&gt;</span>
	                </li>
	                <li class="women">
	                   Login
	                </li>
	            </ul>
	            <ul class="previous">
	            	<li><a href="index.html">Back to Previous Page</a></li>
	            </ul>
	            <div class="clearfix"></div>
		   	</div>
		   	<div class="account_grid">
			   	<div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
				  	<h2>NEW CUSTOMERS</h2>
					<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
					<a class="acount-btn" href="{{ url('/register') }}">Create an Account</a>
			   	</div>
			   	<div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
				  	<h3>REGISTERED CUSTOMERS</h3>
					<p>If you have an account with us, please log in.</p>
					<form method="POST" action="{{ url('/login') }}">
						{{ csrf_field() }}
					  	
					  	<!-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						  	<div>
								<span>Email Address<label>*</label></span>
								<input id="email" type="text" class="form-control" name="email">
								@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
						  	</div>
					  	</div> -->
					  	<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
						  	<div>
								<span>Username<label>*</label></span>
								<input id="username" type="text" class="form-control" name="username">
								@if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
						  	</div>
					  	</div>

					  	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						  	<div>
								<span>Password<label>*</label></span>
								<input id="password" type="password" class="form-control" name="password"> 
								@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
						  	</div>
					  	</div>
					  	<a class="forgot" href="#">Forgot Your Password?</a>
					  	<input type="submit" value="Login">

				    </form>
			   	</div>	
			   	<div class="clearfix"> </div>
		 	</div>
		</div>
	</div>
		<div class="news-letter">
			<div class="container">
				<div class="join">
					<h6>JOIN OUR MAILING LIST</h6>
					<div class="sub-left-right">
						<form>
							<input type="text" value="Enter Your Email Here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email Here';}" />
							<input type="submit" value="SUBSCRIBE" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		</div>
@endsection