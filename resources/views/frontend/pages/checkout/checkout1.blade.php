@extends('frontend.layouts.master')
@section('content')
<!-- start main content -->
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

									<div class="container">
										<h2 class="accordion-title">

											<span>1. Billing Informations
											</span> <a class="accordion-btn open" data-toggle="collapse" href="#collapse-two"></a></h2>
											<div class="accordion-body collapse in" id="collapse-two">
												<div class="row accordion-body-wrapper">
													<form action="{{route('checkout1.store')}}" method="post">
														@csrf
														@php													
														$name =explode(' ',auth()->user()->full_name);
														@endphp
														<div class="col-sm-6 padding-right-md">
															<h3 class="subtitle">Your Personal Details</h3>
															<div class="xs-margin half">
															</div>
															<div class="form-group">
																<label for="firstname" class="form-label">Enter your first name
																	<span class="required">
																	</span>
																</label>
																<input type="text" name="first_name" id="first_name" class="form-control input-lg" value="{{$name[0]}}" required>
															</div>		
															<div class="form-group">
																<label for="email2" class="form-label">Enter your e-mail

																	<span class="required">*
																	</span>
																</label>
																<input type="email" name="email" id="email" class="form-control input-lg" value="{{$user->email}}" readonly="">
															</div>		
															<div class="form-group">
																<label for="fax" class="form-label">Enter your Country
																	<span class="required">*
																	</span>
																</label>
																<input type="text" name="country" class="form-control input-lg" id="country" value="{{$user->country}}" required>
															</div>

															

															<div class="form-group">
																<label for="fax" class="form-label">Town/City
																	<span class="required">*
																	</span>
																</label>
																<input type="text" name="city" id="city" class="form-control input-lg" value="{{$user->city}}" required>
															</div>
															
															<div class="form-group">
																<label for="fax" class="form-label">Postcode/Zip
																	<span class="required">*
																	</span>
																</label>
																<input type="text" name="postcode" class="form-control input-lg" id="postcode" value="{{$user->postcode}}" required>
															</div>

															<div class="form-group custom-checkbox-wrapper">							

																<div class="xs-margin">
																</div>
															</div>
														</div>

														<div class="md-margin visible-xs clearfix">
														</div>

														<div class="col-sm-6 padding-left-md">
															<div class="xs-margin half">
															</div>

															<div class="form-group">
																<label for="lastname" class="form-label">Enter your last name

																	<span class="required">*
																	</span>
																</label>
																<input type="text" name="last_name" id="last_name" class="form-control input-lg" value="{{$name[1]}}" required>
															</div>

															<div class="form-group">
																<label for="telephone" class="form-label">Enter your telephone

																	<span class="required">*
																	</span>
																</label>
																<input type="text" name="phone" id="phone" class="form-control input-lg" value="{{old('phone')}}" required>
															</div>

															<div class="form-group">
																<label for="fax" class="form-label">Enter your Address
																	<span class="required">*
																	</span>
																</label>
																<input type="text" name="address" class="form-control input-lg" id="address" value="{{$user->address}}" required>
															</div>

															<div class="form-group">
																<label for="fax" class="form-label">State
																	<span class="required">*
																	</span>
																</label>
																<input type="text" name="state" id="state" class="form-control input-lg" value="{{$user->state}}" required>
															</div>
															<div class="form-group">
																<label for="fax" class="form-label">Order note
																	<span class="required">*
																	</span>
																</label>
																<textarea id="order-notes" class="form-control input-lg" cols="10" rows="5" id="note" name="note"></textarea>
															</div>															
														</div>
													</div>
													<hr>
													<div class="row accordion-body-wrapper">
														@php													
														$name =explode(' ',auth()->user()->full_name);
														@endphp
														<div class="col-sm-6 padding-right-md">
															<h3 class="subtitle">Shipping Addres 2</h3>
															<div class="xs-margin half">
															</div>
															<div class="form-group">
																<label for="firstname" class="form-label">Enter your first name
																	<span class="required">
																	</span>
																</label>
																<input type="text" name="sfirst_name" id="sfirst_name" class="form-control input-lg" value="{{$name[0]}}" required>
															</div>		
															<div class="form-group">
																<label for="email2" class="form-label">Enter your e-mail

																	<span class="required">*
																	</span>
																</label>
																<input type="email" name="semail" id="semail" class="form-control input-lg" value="{{$user->email}}">
															</div>		
															<div class="form-group">
																<label for="fax" class="form-label">Enter your Country
																	<span class="required">*
																	</span>
																</label>
																<input type="text" name="country" id="country" class="form-control input-lg" value="{{$user->country}}" required>
															</div>

															

															<div class="form-group">
																<label for="fax" class="form-label">Town/City
																	<span class="required">*
																	</span>
																</label>
																<input type="text" name="scity" id="scity" class="form-control input-lg" value="{{$user->city}}" required>
															</div>
															
															<div class="form-group">
																<label for="fax" class="form-label">Postcode/Zip
																	<span class="required">*
																	</span>
																</label>
																<input type="text" name="spostcode" id="spostcode" class="form-control input-lg" value="{{$user->postcode}}" required>
															</div>

															<div class="top-5px">
															</div>

															<div class="form-group custom-checkbox-wrapper">

																<span class="custom-checkbox-container">
																	<input type="checkbox" id="customCheck1">
																	<label for="customCheck1">I have reed and agree to the Privacy Policy.
																	</label>
																</span>					
															</div>

															<div class="xs-margin">
															</div>
															<input type="hidden" name="sub_total" value="{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal()}}">
															<input type="hidden" name="total_amount" value="{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal()}}">
															<input type="submit" class="btn btn-custom btn-lg min-width-md" value="Continue">
														</div>

														<div class="md-margin visible-xs clearfix">
														</div>

														<div class="col-sm-6 padding-left-md">
															<div class="xs-margin half">
															</div>

															<div class="form-group">
																<label for="lastname" class="form-label">Enter your last name

																	<span class="required">*
																	</span>
																</label>
																<input type="text" name="slast_name" id="slast_name" class="form-control input-lg" value="{{$name[1]}}" required>
															</div>

															<div class="form-group">
																<label for="telephone" class="form-label">Enter your telephone

																	<span class="required">*
																	</span>
																</label>
																<input type="text" name="sphone" id="sphone" class="form-control input-lg" value="{{$user->sphone}}" required>
															</div>

															<div class="form-group">
																<label for="fax" class="form-label">Enter your Address
																	<span class="required">*
																	</span>
																</label>
																<input type="text" name="saddress" class="form-control input-lg" id="saddress" value="{{$user->address}}" required>
															</div>

															<div class="form-group">
																<label for="fax" class="form-label">State
																	<span class="required">*
																	</span>
																</label>
																<input type="text" id="sstate" name="sstate" class="form-control input-lg" value="{{$user->state}}" required>
															</div>
															<div class="form-group">
																<label for="fax" class="form-label">Order note
																	<span class="required">*
																	</span>
																</label>
																<textarea id="order-notes" class="form-control input-lg" cols="10" rows="5" name="note"></textarea>
															</div>															
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
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
			<!-- end main content -->
			@endsection
			@section('scripts')
			<script>
				$('#customCheck1').on('change',function(e){
					e.preventDefault();
					if ($this.checked) {
						$('#sfirst_name').val($('#first_name').val());
						$('#slast_name').val($('#last_name').val());
						$('#semail').val($('#email').val());
						$('#sphone').val($('#phone').val());
						$('#scountry').val($('#country').val());
						$('#spostcode').val($('#postcode').val());
						$('#scity').val($('#city').val());
						$('#sstate').val($('#state').val());
						$('#saddress').val($('#address').val());
					}else{
						$('#sfirst_name').val("");
						$('#slast_name').val("");
						$('#semail').val("");
						$('#sphone').val("");
						$('#scountry').val("");
						$('#spostcode').val("");
						$('#scity').val("");
						$('#sstate').val("");
						$('#saddress').val("");
					}
				});
			</script>
			@endsection