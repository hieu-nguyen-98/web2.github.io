@extends('frontend.layouts.master')
@section('content')

<!-- start main content -->
<main class="main-container">
<section class="product_content_area pt-40">
	<!-- start of page content -->

	<div class="lookcare-product-single container">

		<div class="row">

			<div class="main col-xs-12" role="main">

				<div class=" product">

					<div class="row">

						<div class="col-md-6 col-sm-6 summary-before ">

							<div class="product-slider product-shop">
								<span class="onsale">{{$product->conditions}}</span>
								<ul class="slides">
									<li data-thumb="img/temp-images/hoodie_7_front-140x140.jpg">
										<a href="" data-imagelightbox="gallery" class="hoodie_7_front">
											<img src="{{$product->photo}}" height="500" width="400" class="attachment-shop_single" alt="image">
										</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-sm-6 col-md-6 product-review entry-summary">

							<h1 class="product_title">Belted Eyelet Lace Fit</h1>
							<div>
								<p class="price"><del><span class="text-danger">${{number_format($product->price)}}</span></del>
									<ins><span class="amount">${{number_format($product->offer_price)}}</span></ins></p>
							</div>
							<div class="">
								<div class="star-rating" title="Rated 4.00 out of 5">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a href="#reviews" class="woocommerce-review-link">(<span class="count">3</span> customer reviews)</a>
							</div>
							<br>
							<p>{!!$product->summary!!}</p>

							<form class="variations_form cart" method="post">
								<div class="quantity">
									<input type="number" step="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" min="1">
								</div>

								<button type="submit" class="cart-button add_to_cart" data-quantity="1" data-product-id="{{$product->id}}" id="add_to_cart{{$product->id}}">Add to cart</button>

							</form>
							<div class="widget size mt-2 mb-0">
								<h6 class="widget-title">Size:</h6>
								<span class="badge rounded-pill bg-primary">S</span>
								<span class="badge rounded-pill bg-primary">M</span>
								<span class="badge rounded-pill bg-primary">L</span>
								<span class="badge rounded-pill bg-primary">XL</span>
							</div>
							<div class="product_meta">
								<span class="sku_wrapper">SKU: <span class="sku">N/A</span>.</span>


								<span class="posted_in">Categories: <a href="#" rel="tag">Clothing</a>, <a href="#">Hoodies</a>.</span>


							</div>

							<div class="share-social-icons">

								<a href="#" target="_blank" title="Share on Facebook">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="#" target="_blank" title="Share on Twitter">
									<i class="fa fa-twitter"></i>
								</a>
								<a href="#" target="_blank" title="Pin on Pinterest">
									<i class="fa fa-pinterest"></i>
								</a>
								<a href="#" target="_blank" title="Share on Google+">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>

						</div>
						<!-- .summary -->
					</div>
					<div class="wrapper-description">

						<ul class="tabs-nav clearfix">
							<li class="active">Description</li>
							<li>Review (3)</li>
						</ul>
						<div class="tabs-container product-comments">

							<div class="tab-content">
								<section class="related-products">

									<h2>Product Description</h2>

									<p>
										{!! $product->description !!}
									</p>

									<h3 class="section-title">Related Products</h3>

									<div class="related-products-wrapper">

										<div class="related-products-carousel">

											<div class="product-control-nav">
												<a class="prev"><i class="fa fa-angle-left"></i></a>
												<a class="next"><i class="fa fa-angle-right"></i></a>
											</div>

											<div class="products-top"></div>
											@if(count($product->rel_product) >0)
											<div class="row product-listing">
												<div id="product-carousel" class="product-listing">					@foreach($product->rel_product as $item)
													<div class="product  item first ">
														<article>
															<figure>
																<a href="{{route('product.details',$item->slug)}}">
																	<img src=" {{$item->photo}} " class="img-responsive" alt=" {{$item->title}} " >
																</a>
																<figcaption><span class="amount">${{$item->offer_price}} <small><del class="text-danger">${{$item->price}}</del></small> </span></figcaption>
															</figure>
															<p class=""> {{\App\Models\Brand::where('id',$item->brand_id)->value('title')}} </p>
															<h4 class="title"><a href="#"> {{$item->title}} </a></h4>
															<a href="{{route('product.details',$item->slug)}}" class="button-add-to-cart">Add to cart</a>
														</article>
													</div>
													@endforeach
												</div>
											</div>
											@else
											<p class="text-danger">---No Related Product---</p>
											@endif
										</div>

									</div>

								</section>
							</div>



							<div class="tab-content">
								<div class="panel entry-content">

									<h2>Product Description</h2>

									<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
								</div>

								<div class="panel entry-content">
									<div id="reviews">
										<div class="row">
											<div class="col-md-6">
												<div id="comments">
													<h3>3 reviews for Ship Your Idea</h3>

													<ol class="commentlist">
														<li class="comment depth-1">

															<div class="comment_container">

																<img alt="gravatar" src="img/temp-images/com-grav1.jpg" class="avatar photo">
																<div class="comment-text">
																	<p class="meta">
		                                                                            <span class="star-rating" title="Rated 4.00 out of 5">
									                                            <i class="fa fa-star"></i>
									                                            <i class="fa fa-star"></i>
									                                            <i class="fa fa-star"></i>
									                                            <i class="fa fa-star"></i>
									                                            <i class="fa fa-star-o"></i>
									                                        </span>
																	<strong>Stuart</strong> – <time datetime="2013-06-07T13:03:29+00:00">June 7, 2013</time>:
																	</p>

																	<div class="description">
																		<p>Another great quality product that anyone who see’s me wearing has asked where to purchase one of their own.</p>
																	</div>
																</div>
															</div>
														</li>
														<!-- #comment-## -->
														<li class="comment  depth-1">

															<div class="comment_container">

																<img src="{{asset('frontend/img/temp-images/com-grav2.jpg" alt="image')}}" class="avatar photo">
																<div class="comment-text">




																	<p class="meta">
                                                                            <span class="star-rating" title="Rated 4.00 out of 5">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span>
																		<strong>Ryan</strong> – <time datetime="2013-06-07T13:24:52+00:00">June 7, 2013</time>:
																	</p>


																	<div class="description">
																		<p>This hoodie gets me lots of looks while out in public, I got the blue one and it’s awesome. Not sure if people are looking at my hoodie only, or also at my rocking bod.</p>
																	</div>
																</div>
															</div>
														</li>
														<!-- #comment-## -->
														<li class="comment depth-1">

															<div class="comment_container">

																<img src="{{asset('frontend/img/temp-images/com-grav3.jpg')}}" alt="image" class="avatar photo">
																<div class="comment-text">

																	<div class="star-rating" title="Rated 3 out of 5">
																	</div>

																	<p class="meta">
                                                                            <span class="star-rating" title="Rated 4.00 out of 5">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
																		<strong>Maria</strong> – <time datetime="2013-06-07T15:53:31+00:00">June 7, 2013</time>:
																	</p>


																	<div class="description">
																		<p>Ship it!</p>
																	</div>
																</div>
															</div>
														</li>
														<!-- #comment-## -->
													</ol>


												</div>

											</div>
											<div class="col-md-6">
												<div id="review_form_wrapper">
													<div id="review_form">
														<div id="respond" class="comment-respond">
															<h3 class="comment-reply-title">Add a review </h3>
															<form action="#" method="post" id="commentform" class="comment-form">
																<p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input id="author" name="author" type="text"></p>
																<p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input id="email" name="email" type="text"></p>
																<p class="comment-form-comment"><label for="comment">Your Review</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>
																<p class="form-submit">
																	<input name="submit" type="submit" id="submit" class="submit" value="Submit">
																</p>
															</form>
														</div>
														<!-- #respond -->
													</div>
												</div>
											</div>
										</div>

										<div class="clear"></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- #product-293 -->
			</div>
			<!-- end of main -->
		</div>
		<!-- end of .row -->
	</div>
	<!-- end of page content -->
</section>

<!-- service area -->
	<section class="block gray no-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="content-box no-margin go-simple">
						<div class="mini-service-sec">
							<div class="row">
								<div class="col-md-3">
									<div class="mini-service">
										<i  class="fa fa-paper-plane"></i>
										<div class="mini-service-info">
											<h3>Worldwide Delivery</h3>
											<p>unc tincidunt, on cursusau gmetus, lorem Hore</p>
										</div>
									</div><!-- Mini Service -->
								</div>
								<div class="col-md-3">
									<div class="mini-service">
										<i  class="fa  fa-newspaper-o"></i>
										<div class="mini-service-info">
											<h3>Worldwide Delivery</h3>
											<p>unc tincidunt, on cursusa ugmetus, lorem Hore</p>
										</div>
									</div><!-- Mini Service -->
								</div>
								<div class="col-md-3">
									<div class="mini-service">
										<i  class="fa fa-medkit"></i>
										<div class="mini-service-info">
											<h3>Friendly Stuff</h3>
											<p>unc tincidunt, on cursusau gmetus, lorem Hore</p>
										</div>
									</div><!-- Mini Service -->
								</div>
								<div class="col-md-3">
									<div class="mini-service">
										<i  class="fa  fa-newspaper-o"></i>
										<div class="mini-service-info">
											<h3>24/h Support</h3>
											<p>unc tincidunt, on cursusa ugmetus, lorem Hore</p>
										</div>
									</div><!-- Mini Service -->
								</div>
							</div>
						</div><!-- Mini Service Sec -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="clearfix"></div>
<!-- end service area -->
</main>
<!-- end main content -->

@endsection
@section('scripts')
<script type="text/javascript">
	$(document).on('click','.add_to_cart', function(e){
		e.preventDefault();
		var product_id = $(this).data('product-id');
		var product_qty = $(this).data('quantity');
		// alert(product_qty);
		var token =" {{csrf_token()}}";
		var path =" {{route('cart.store')}} ";

		$.ajax({
			url:path,
			type:"POST",
			dataType:"JSON",
			data:{
				product_id:product_id,
				product_qty:product_qty,
				_token:token,
			},
			beforeSend:function(){
				$('#add_to_cart'+product_id).html('<i class="fa fa-spiiner"></i>Loading...');
			},
			complete:function(){
				$('#add_to_cart'+product_id).html('<i class="fa fa-cart-plus"></i>Add to cart');
			},
			success:function(data){
				// alert(data['cart_count']);
				console.log(data);
				$('body #header-ajax').html(data['header']);
				$('body #cart_counter').html(data['cart_count']);
				if (data['status']) {
					swal({
					  title: "Good job!",
					  text: data['message'],
					  icon: "success",
					  button: "OK!",
					});
				}
			},
			error:function(err){
					console.log(err);
				}
		});
	});
</script>
@stop