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
									<div class="accordion-group panel">
										<div class="accordion-group panel">
											<div class="accordion-group panel">
												<div class="container">
													<h2 class="accordion-title mb-0">
														<span>5. Confirm Order
														</span> <a class="accordion-btn open" data-toggle="collapse" href="#collapse-five"></a></h2>

														<div class="accordion-body collapse in" id="collapse-five">

															<div class="row accordion-body-wrapper">

																<div class="col-md-12">
																	<table class="table checkout-table">
																		<thead>
																			<tr>
																				<th class="table-title">Product Name
																				</th>
																				<th class="table-title">Unit Price
																				</th>
																				<th class="table-title">Quantity
																				</th>
																				<th class="table-title">SubTotal
																				</th>
																				<th>
																					<span class="close-button disabled">
																					</span>
																				</th>
																			</tr>
																		</thead>
																		<tbody>
																			@foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
																			<tr>
																				<td class="product-name-col">
																					<figure>
																						<a href="#"><img src="{{$item->model->photo}}" alt="White linen sheer dress"></a>
																					</figure>
																					<h3 class="product-name"><a href="#">{{$item->name}}</a></h3>
																					<ul>
																						<li>Color: White</li>
																						<li>Size: SM</li>
																					</ul>
																				</td>
																				<td class="product-price-col">

																					<span class="product-price-special">${{number_format($item->price)}}
																					</span>
																				</td>
																				<td class="product-price-col">

																					<span class="product-price-special">{{$item->qty}}
																					</span>
																				</td>
																				<td class="product-total-col">

																					<span class="product-price-special">${{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}
																					</span>
																				</td>
																				<td>
																					<a href="#" class="close-button"></a>
																				</td>
																			</tr>
																			@endforeach
																			<tr class="merged">
																				<td class="checkout-table-title" colspan="4">

																					<span>Subtotal:
																					</span>
																				</td>
																				<td class="checkout-table-price" colspan="2">$ {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}
																				</td>
																			</tr>
																			<tr class="merged">
																				<td class="checkout-table-title" colspan="4">

																					<span>Shipping:
																					</span>
																				</td>
																				<td class="checkout-table-price" colspan="2">${{number_format(\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'],2)}}
																				</td>
																			</tr>
																			@if(\Illuminate\Support\Facades\Session::has('coupon'))
																			<tr class="merged">
																				<td class="checkout-table-title" colspan="4">

																					<span>Coupon:
																					</span>
																				</td>
																				<td class="checkout-table-price" colspan="2">${{number_format(\Illuminate\Support\Facades\Session::get('coupon')['value'],2)}}
																				</td>
																			</tr>
																			@endif
																		</tbody>
																		<tfoot>
																			<tr>
																				<td class="checkout-total-title" colspan="4">

																					<span>TOTAL:
																					</span>
																				</td>
																				@if(\Illuminate\Support\Facades\Session::has('coupon'))
																					<td class="checkout-total-price cart-total" colspan="2">${{number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+\Illuminate\Support\Facades\Session::get('coupon')['value'],2)}}
																					</td>
																				@elseif(\Illuminate\Support\Facades\Session::has('checkout'))
																					<td>${{number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())+\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'],2)}}</td>
																				@elseif(\Illuminate\Support\Facades\Session::has('coupon') && \Illuminate\Support\Facades\Session::has('checkout'))

																					<td>${{number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal()+\Illuminate\Support\Facades\Session::get('checkout')[0]['delivery_charge'])-\Illuminate\Support\Facades\Session::get('coupon')['value']),2}}</td>

																				@endif
																			</tr>
																		</tfoot>
																	</table>
																	<div class="md-margin half">
																	</div>
																	<div class="text-right"><a href="{{route('checkout.store')}}" class="btn btn-custom-6 btn-lger min-width-slg">CONFIRM ORDER</a>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="xlg-margin">
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
				</div>
			</section>
		</main>

		@stop