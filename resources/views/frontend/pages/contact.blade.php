@extends('frontend.layouts.master')
@section('content')
	<!-- start main content -->
<main class="main-container">
<!-- contact content -->


	<!-- Start Contact Us -->

	<div id="Contact" class="light-wrapper">
		<div class="container inner">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="Contact-Form">
							<form class="leave-comment contact-form" method="post" action="#" id="cform" autocomplete="on">
								<div class="Contact-us">
									<div class="form-input col-md-4">
										<input type="text" name="name" placeholder="Your Name" required>
									</div>
									<div class="form-input col-md-4">
										<input type="email" name="email" placeholder="Email" required>
									</div>
									<div class="form-input col-md-4">
										<input type="text" name="contact_phone" placeholder="Phone">
									</div>
									<div class="form-input col-md-12">
										<textarea class="txt-box textArea" name="message" cols="40" rows="7" id="messageTxt" placeholder="Message" spellcheck="true" required></textarea>
									</div>
									<div class="form-submit col-md-12">
										<input type="submit" class="btn btn-custom-6" value="Send Message">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4">

					<div class="Contact-Info">
						<h4>Contact Details</h4>
						<div class="tex-contact">
							<p>Lorem ipsum dolor sit amet, adipiscing condimentum tristique vel, eleifend sed turpis. Amet, consectetur adipising elit Integer.</p>
						</div>
						<div class="Block-Contact col-md-6">
							<p>Phone :</p>
							<ul>
								<li>
									<i class="fa fa-phone"></i>
									<span>+0 (123) 456 - 7890</span>
								</li>
								<li>
									<i class="fa fa-fax"></i>
									<span>+0 (123) 456 - 7890</span>
								</li>
							</ul>
						</div>
						<div class="Block-Contact col-md-6">
							<p>Email :</p>
							<ul>
								<li>
									<i class="fa fa-envelope"></i>
									<span>demo@metlife.com</span>
								</li>
							</ul>
						</div>
						<div class="Block-Contact col-md-12">
							<p>Address :</p>
							<ul>
								<li>
									<i class="fa fa-map-marker"></i>
									<span>3453 corn street, Sanford, FL 34232.</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- End Contact Us -->
<!-- end contact content -->

@stop