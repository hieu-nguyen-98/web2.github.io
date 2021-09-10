@extends('frontend.layouts.master')
@section('content')	
	<main class="container">


	<section>

		<div class="signinpanel">

			<div class="row">

				<div class="col-md-6">

					<form method="post" action=" {{route('login.submit')}} ">
						@csrf
						<h4 class="nomargin">Sign In</h4>
						<p class="mt5 mb20">Login to access your account.</p>

						<input type="email" class="form-control uname" name="email" placeholder="Email" />
						@error('email')
						<p class="text-danger"> {{$message}} </p>
						@enderror
						<input type="password" class="form-control pword" name="password" placeholder="Password" />
						@error('password')
						<p class="text-danger"> {{$message}} </p>
						@enderror
						<a href="#"><small>Forgot Your Password?</small></a>
						<button class="btn btn-success btn-block">Sign In</button>

					</form>
				</div><!-- col-sm-5 -->

				<div class="col-md-6">

					<form method="post" action=" {{route('register.submit')}} ">
						@csrf
						<h3 class="nomargin">Sign Up</h3>
						<p class="mt5 mb20">Already a member? <a href="signin.html"><strong>Sign In</strong></a></p>

						<label class="control-label">Name</label>
						<div class="row mb10">
							<div class="col-sm-12">
								<input type="text" name="full_name" class="form-control" placeholder="Full_name" value=" {{old('full_name')}}" />
								@error('full_name')
								<p class="text-danger"> {{$message}} </p>
								@enderror
							</div>
						</div>

						<div class="mb10">
							<label class="control-label">Username</label>
							<input type="text" name="username" id="username" class="form-control" value=" {{old('username')}} " />
							@error('username')
							<p class="text-danger"> {{$message}} </p>
							@enderror
						</div>
						<div class="mb10">
							<label class="control-label">Email</label>
							<input type="email" name="email" class="form-control" value=" {{old('email')}}" />
							@error('email')
							<p class="text-danger"> {{$message}} </p>
							@enderror
						</div>

						<div class="mb10">
							<label class="control-label">Password</label>
							<input type="password" name="password" class="form-control" />
							@error('password')
							<p class="text-danger"> {{$message}} </p>
							@enderror
						</div>
						<div class="mb10">
							<label class="control-label">Confirm Password</label>
							<input type="password" name="password_confirmation" class="form-control" />
							@error('password')
							<p class="text-danger"> {{$message}} </p>
							@enderror
						</div>
						<br />

						<button class="btn btn-success btn-block">Sign Up</button>
					</form>
				</div><!-- col-sm-6 -->



			</div><!-- row -->


		</div><!-- signin -->

	</section>
</main>
@stop