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
								<div class="accordion-group panel">

									<div class="container">
										<h2 class="accordion-title mb-0">

											<span>Shipping Method
											</span> <a class="accordion-btn open" data-toggle="collapse" href="#collapse-five"></a></h2>

											<div class="accordion-body collapse in" id="collapse-five">
												<form action="{{route('checkout2.store')}}" method="post">
													@csrf
													<div class="row accordion-body-wrapper">

														<div class="col-md-12">
															<table class="table checkout-table">
																<thead>
																	<tr>
																		<th class="table-title">Method
																		</th>
																		<th class="table-title">Delivery Time
																		</th>
																		<th class="table-title">Delivery Charge
																		</th>
																		<th class="table-title">Choose
																		</th>
																	</tr>
																</thead>
																<tbody>
																	@if(count($shippings) > 0)
																	@foreach($shippings as $key => $item)
																	<tr>
																		<td class="product-name-col">
																			<span class="product-price-special">{{$item->shipping_address}}
																			</span>
																		</td>
																		<td class="product-code">{{$item->delivery_time}}
																		</td>
																		<td class="product-code">${{number_format($item->delivery_charge)}}</td>
																		<td class="product-total-col">
																			<input type="radio" name="delivery_charge" id="customRadio{{$key}}" value="{{$item->delivery_charge}}" required>
																			<label for="customRadio{{$key}}"></label>
																		</td>
																	</tr>
																	@endforeach
																	@else
																	<tr>
																		<td>
																			<span>No Shipping Method Found!!</span>
																		</td>
																	</tr>
																	@endif
																</tbody>
															</table>

															<div class="md-margin half">
															</div>

															<div class="text-right"><button class="btn btn-custom-6 btn-lger min-width-slg" style="color: darkred;">CONTINUE</button>
															</div>
														</div>

													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

								<div class="xlg-margin">
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