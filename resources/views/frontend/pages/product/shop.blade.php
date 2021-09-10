@extends('frontend.layouts.master')
@section('content')
<main class="main-container">
<section class="men_area pt-40">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9">
				<div class="row">
					<div class="col-lg-12">
						<div class="kat-shoe-bg imgframe6">
							<img src="{{asset('frontend/img/large-banner-4.png')}}" alt="" />
						</div>
					</div>
				</div>

				<div class="product-filter">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2">
							<h5 class="control-label">Sort By:</h5>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-4">
							<select name="price-type" id="input-sort" class="form-control">
								<option value="">Default</option>
								<option value="">Name (A - Z)</option>
								<option value="">Name (Z - A)</option>
								<option value="">Price (Low > High)</option>
								<option value="">Price (High > Low)</option>
								<option value="">Rating (Lowest)</option>
							</select>
						</div>
					</div>
				</div>

				<div id="shop-all" class="row">
					<!-- Product Item #1 -->
					@if(count($products) >0)
					@foreach($products as $item)
					<div class="col-xs-12 col-sm-6 col-md-4 product-item filter-featured">
						<div class="product-img">
							<img src="{{$item->photo}}" width="254" height="150" alt="product">
							<div class="product-new">
								{{$item->conditions}}
							</div>
							<div class="product-hover">
								<div class="product-cart">
									<a class="btn btn-secondary btn-block" href="#">Add To Cart</a>
								</div>
							</div>
						</div>
						<!-- .product-img end -->
						<div class="product-bio">
							<h4>
								<a href="{{route('product.details',$item->slug)}}">{{$item->title}}</a>
							</h4>
							<p class="product-price">${{number_format($item->offer_price),2}} <small><del class="text-danger">${{number_format($item->price),2}}</del></small></p>
						</div>
						<!-- .product-bio end -->
					</div>
					@endforeach
					@else
					<p>No product found!</p>
					@endif
					<!-- .product-item end -->					
				</div>
				{{$products->links()}}
				<hr>

			</div>


			<aside class="col-md-3 sidebar">

				<div class="widget category-widget">

					<h3>Categories</h3>

					<ul id="category-widget">
						@foreach($cats as $item)
						<li class="open"><a href="{{route('product.category',$item->slug)}}">{{$item->title}}
							<span class="category-widget-btn"></span></a>
						</li>
						@endforeach
					</ul>
				</div>
				<!-- /.category widget -->

				<div class="information-entry">
					<div class="information-blocks">
						<a class="sale-entry vertical" href="#">
							<span class="hot-mark yellow">hot</span>
							<span class="sale-price"><span>-40%</span> Valentine <br> Underwear Sale</span>
							<span class="sale-description">Lorem ipsum dolor sitamet, conse adipisc sed do eiusmod tempor.</span>
							<img style="height: 120px" class="sale-image" src="img/text-widget-image-5.jpg" alt="">
						</a>
					</div>
				</div>


				<!-- /.widget -->

			</aside>
			<!-- /.col-md-3 -->
		</div>
	</div>
</section>

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
</main>

@endsection