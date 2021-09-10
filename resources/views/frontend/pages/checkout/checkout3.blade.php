@extends('frontend.layouts.master')
@section('content')
<main class="main-container">
	<!--Checkout Area Start-->
	<section class="checkout-area area-padding ptb-40">
		<!-- Begin checkout -->
		<div class="ld-subpage-content">

			<div class="checkout-content">

				<!-- Begin checkout section -->
				<section class="checkout">
					<section class="checkout-section">

						<div class="ld-checkout-inner">

							<div class="xs-margin"></div>

							<div class="accordion" id="collapse">


								<div class="accordion-group panel darkerbg">
									<form action="{{route('checkout3.store')}}" method="post">
										@csrf

									<div class="accordion-group panel">

										<div class="container">
											<h2 class="accordion-title">

												<span>3. Payment Online
												</span> <a class="accordion-btn" data-toggle="collapse" href="#collapse-three"></a></h2>

												<div class="accordion-body collapse" id="collapse-three">

													<div class="row accordion-body-wrapper">

														<div class="col-md-12">
															<input type="checkbox" name="payment_method" id="customCheck2" value="cod">
															<label for="customCheck2">Cash On Delivery</label>
														</div>
													</div>

													<div class="lg-margin2x">
													</div>
												</div>
											</div>
										</div>

										<div class="accordion-group panel">

											<div class="container">
												<h2 class="accordion-title">

													<span>4. Payment on delivery
													</span> <a class="accordion-btn" data-toggle="collapse" href="#collapse-four"></a></h2>

													<div class="accordion-body collapse" id="collapse-four">

														<div class="row accordion-body-wrapper">

															<div class="col-md-12">

																<input type="checkbox" required name="payment_method" id="customCheck2" value="cod">
																<label for="customCheck2">Cash On Delivery</label>
															</div>
														</div>

														<div class="lg-margin2x">
														</div>
														<div class="text-right"><button class="btn btn-custom-6 btn-lger min-width-slg">CONFIRM ORDER</button>
														</div>
													</div>
												</div>
											</div>

										</div>
									</form>

									</section>


								</section>
								<!-- End checkout section -->


							</div>
							<!-- /.checkout-content -->
						</div>
						<!-- /.ld-subpage-content -->
						<!-- End checkout -->
					</section>
					<!--End of Checkout Area-->
				</main>

				@stop