@extends('frontend.layouts.master')
@section('content')
<main class="main-container">

	<!-- new collection directory -->
	<section id="content-block" class="slider_area">
			<div class="container">
				<div class="content-push">
					<div class="row">
						@if(count($categories) >0)
						<div class="col-md-3 col-md-push-9">
							<div class="sidebar-navigation">
								<div class="title">Product Categories<i class="fa fa-angle-down"></i></div>
								<div class="list">
									@foreach($categories as $cat)
									<a class="entry" href=" {{route('product.category',$cat->slug)}} "><span><i class="fa fa-angle-right"></i>{{$cat->title}}</span></a>
									@endforeach
								</div>
							</div>
							<div class="clear"></div>
						</div>
						@endif
						
						
						<div class="col-md-9 col-md-pull-3">
							@if(count($banners)>0)
							<div class="header_slider">
								<article class="boss_slider">
									<div class="tp-banner-container">
										<div class="tp-banner tp-banner0">
											<ul>
												
												@foreach($banners as $banner)
												<!-- SLIDE  -->
												<li data-link="#" data-target="_self" data-transition="flyin" data-slotamount="7" data-masterspeed="500" data-saveperformance="on">
													<!-- MAIN IMAGE --><img src="{{$banner->photo}}" alt="slidebg1" data-lazyload="{{$banner->photo}}" data-bgposition="left center" data-kenburns="off" data-duration="14000" data-ease="Linear.easeNone" data-bgpositionend="right center" />
													<!-- LAYER NR. 1 -->
													<div class="tp-caption very_big_white randomrotate customout rs-parallaxlevel-0" data-x="270" data-y="140" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="500" data-end="4800" data-endspeed="300" data-easing="easeInOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;"> Trendy </div>
													<!-- LAYER NR. 2 -->
													<div class="tp-caption very_large_white_text randomrotate customout rs-parallaxlevel-0" data-x="270" data-y="250" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="800" data-end="4800" data-endspeed="300" data-easing="easeInOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;"> selection </div>
													<!-- LAYER NR. 3 -->
													<div class="tp-caption large_white_text randomrotate customout rs-parallaxlevel-0" data-x="355" data-y="363" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="300" data-start="1200" data-end="4800" data-endspeed="300" data-easing="easeInOutBack" data-endeasing="easeOutBack" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 2;"> SHOP NOW </div>
												</li>
												@endforeach
												
											</ul>
											<div class="slideshow_control"></div>
										</div><!-- /.tp-banner -->
									</div>
								</article>
							</div><!-- /.header_slider -->

							<div class="clear"></div>
							@endif
						</div>
						
						
					</div>
				</div>
			</div>
	</section>
	<!-- end new collection directory -->

	<!-- Recent items Starts -->
	@php
		$new_product = \App\Models\Product::where(['status'=>'active','conditions'=>'new'])->orderBy('id','DESC')->limit(8)->get();
	@endphp
	@if(count($new_product) >0)
	<section id="recent-product">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<section class="related-products">
						<!-- Block heading two -->
						<div class="block-heading-two">
							<h3><span>New Items</span></h3>
						</div>

						<div class="related-products-wrapper">

							<div class="related-products-carousel">

								<div class="product-control-nav">
									<a class="prev"><i class="fa fa-angle-left"></i></a>
									<a class="next"><i class="fa fa-angle-right"></i></a>
								</div>
								<div class="row product-listing">
									<div id="product-carousel" class="product-listing">
										@foreach($new_product as $nproduct)
										<div class="product item first ">
											<article>
												<figure>
													<a href="{{route('product.details',$nproduct->slug)}}">
														<img src="{{$nproduct->photo}}" class="img-responsive " alt="T_5_front">
													</a>
													<figcaption><span class="amount">${{number_format($nproduct->price)}}&nbsp; <small class="text-danger"><del>{{number_format($nproduct->offer_price)}}</del></small></span></figcaption>
												</figure>
												<h4 class="title"><a href=" {{route('product.details',$nproduct->slug)}} ">{{$nproduct->title}}</a></h4>
												<a href="{{route('product.details',$nproduct->slug)}}" class="button-add-to-cart">Add to cart</a>
											</article>
										</div>
										@endforeach

									</div>

								</div>
							</div>

						</div>

					</section>
				</div>
			</div>
		</div>
	</section>
	@endif

	<!-- Recent items Ends -->
	<section id="popular-product" class="ecommerce">
		<div class="container">
			<!-- Shopping items content -->
			<div class="shopping-content">

				<!-- Block heading two -->
				<div class="block-heading-two">
					<h3><span>Popular Items</span></h3>
				</div>

				<div class="row">
					@if(count($products) >0)
					@foreach($products as $item)
					<div class="col-md-3 col-sm-6">
						<!-- Shopping items -->
						<div class="shopping-item">
							<!-- Image -->
							<a href="{{route('product.details',$item->slug)}}"><img class="img-responsive" src="{{$item->photo}}" alt="" /></a>
							<!-- Shopping item name / Heading -->
							<h4><a href="{{route('product.details',$item->slug)}}">{{$item->title}}</a><span class="color pull-right">${{$item->offer_price}}</span></h4>
							<div class="clearfix"></div>
							<!-- Buy now button -->
							<div class="visible-xs">
								<a class="btn btn-color btn-sm" href="#">Buy Now</a>
							</div>
							<!-- Shopping item hover block & link -->
							<div class="item-hover bg-color hidden-xs">
								<a href="#">Add to cart</a>
							</div>
							<!-- Hot tag -->
							<span class="hot-tag bg-red">{{$item->conditions}}</span>
						</div>
					</div>
					@endforeach
					@else
					<p>Product not found!</p>
					@endif
				</div>
			{{$products->links('vendor.pagination.custom')}}
			</div>
		</div>
	</section>


	<!-- Start Our Shop Items -->

	<div class="bt-block-home-parallax" style="background-image: url({{asset($promo_banner->photo)}}); width:100%; height: 364px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="lookbook-product">
						<h2 style="color: #000;"><a href="#" title="">Collection 2016 </a></h2>
						<ul class="simple-cat-style">
							@foreach($categories as $item)
							<li><a href="{{route('product.category',$item->slug)}}" title=""><span style="color: #000;">{{$item->title}}</span></a></li>
							@endforeach
						</ul>
						<a href="{{route('shop')}}" title="">read more</a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.bt-block-home-parallax -->

	<!-- Start Our Clients -->

	<section id="Clients" class="light-wrapper">
		<div class="container inner">
			<div class="row">
				<div class="Last-items-shop col-md-3 col-sm-6">

					<!-- Block heading two -->
					<div class="block-heading-two block-heading-three">
						<h3><span>New Products</span></h3>
					</div>
					<!--<div class="Top-Title-SideBar">
						<h3>Special Offer</h3>
					</div>-->
					<div class="Last-post">
						<ul class="shop-res-items">
							@foreach($product as $item)
							<li>
								<a href="#"><img src="{{asset($item->photo)}}" alt=""></a>
								<h6><a href="route('product.details',$item->slug)">{{$item->title}}</a></h6>
								<span class="sale-date">${{$item->price}}</span>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="Last-items-shop col-md-3 col-sm-6">
					<!-- Block heading two -->
					<div class="block-heading-two block-heading-three">
						<h3><span>Best Sales</span></h3>
					</div>
					<!--<div class="Top-Title-SideBar">
						<h3>Best Sellers</h3>
					</div>-->
					<div class="Last-post">
						<ul class="shop-res-items">
							@foreach($best_sales as $item)
							<li>
								<a href="#"><img src="{{asset($item->photo)}}" alt=""></a>
								<h6><a href="{{route('product.details',$item->slug)}}">{{$item->title}}</a></h6>
								<span class="sale-date">${{$item->offer_price}}</span>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="Last-items-shop col-md-3 col-sm-6">
					<!-- Block heading two -->
					<div class="block-heading-two block-heading-three">
						<h3><span>Popular Brands</span></h3>
					</div>
					<!--<div class="Top-Title-SideBar">
						<h3>Featured</h3>
					</div>-->
					@if(count($brands)>0)
					<div class="Last-post">
						<ul class="shop-res-items">
							@foreach($brands as $item)
							<li>
								<a href="#"><img src="{{asset($item->photo)}}" alt="{{$item->title}}"></a>
								<h6><a href="#">{{$item->title}}</a></h6>
							</li>
							@endforeach
						</ul>
					</div>
					@endif
				</div>
				<div class="Last-items-shop col-md-3 col-sm-6">
					<!-- Block heading two -->
					<div class="block-heading-two block-heading-three">
						<h3><span>Best Selling</span></h3>
					</div>
					<!--<div class="Top-Title-SideBar">
						<h3>Sales</h3>
					</div>-->
					<div class="Last-post">
						<ul class="shop-res-items">
							@foreach($best_selling as $item)
							<li>
								<a href="#"><img src="{{asset($item->photo)}}" alt=""></a>
								<h6><a href="{{route('product.details',$item->slug)}}">{{$item->title}}</a></h6>
								<span class="sale-date">${{$item->price}}</span>
							</li>
							@endforeach
			
						</ul>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- End Our Clients  -->

</main>
@stop