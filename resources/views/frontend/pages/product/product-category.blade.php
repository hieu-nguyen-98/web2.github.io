@extends('frontend.layouts.master')
@section('content')
<section class="men_area pt-40">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9">
				<div class="row">
				</div>
				<div class="product-filter">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href=" {{route('/')}} ">Home</a></li>
								<li class="breadcrumb-item"><a href="">{{$categories->title}}</a></li>
							</ol>
						</div>
					</div>
				</div>
				<div class="product-filter">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-sm-2">
							<h5 class="control-label">Sort By:</h5>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-4">
							<select id="sortBy" name="price-type" id="input-sort" class="form-control">
								<option selected>Default Sort</option>
								<option value="priceAsc" {{old('sortBy')=='priceAsc' ? 'selected' : '' }} >Price - Lower to Higher</option>
								<option value="priceDesc" {{old('sortBy')=='priceAsc' ? 'selected' : '' }}>Price - Higher to Lower</option>
								<option value="titleAsc" {{old('sortBy')=='titleAsc' ? 'selected' : '' }}>Alphabetical Ascending </option>
								<option value="titleDesc" {{old('sortBy')=='titleDesc' ? 'selected' : '' }}>Alphabetical Descending</option>
								<option value="disAsc" {{old('sortBy')=='disAsc' ? 'selected' : '' }}>Discount - Lower to Higher</option>
								<option value="disDesc" {{old('sortBy')=='disDesc' ? 'selected' : '' }}>Discount - Higher to Lower</option>
							</select>
						</div>
					</div>
				</div>
				<div class="shop-all" id="product-data" class="row">
					<!-- Product Item #1 -->
					@include('frontend.pages.product.single-product')
					
					<!-- .product-item end -->
				</div>
				<!-- <div class="col-md-12 text-center ajax-load" >
					<img src=" {{asset('frontend/img/DzUu.gif')}}" style="width: 10%;border-radius: 50%;" >
				</div> -->
			</div>

			<aside class="col-md-3 sidebar">

				<div class="widget category-widget">

					<h3>Categories</h3>

					<ul id="category-widget">
							<span class="category-widget-btn"></span></a>
							<ul>
								@foreach($category as $cat)
								<li><a href="#">{{$cat->title}}</a></li>
								@endforeach
							</ul>
						</li>
					</ul>
				</div>
				<!-- /.category widget -->

				<div class="widget">

					<div class="accordion" id="sidebar-collapse-filter">

						<div class="accordion-group panel">

							<div class="accordion-title">
								Size Filter
								<a class="accordion-btn open" data-toggle="collapse" href="#size-filter"></a>
							</div>

							<div class="accordion-body collapse in" id="size-filter">

								<div class="accordion-body-wrapper">

									<div class="filter-color-container">

										<div class="row">
											<a href="#" class="filter-size-box">xs</a>
											<a href="#" class="filter-size-box">s</a>
											<a href="#" class="filter-size-box">m</a>
											<a href="#" class="filter-size-box">ml</a>
											<a href="#" class="filter-size-box">l</a>
											<a href="#" class="filter-size-box">xl</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.accordion-group -->

						<div class="accordion-group panel">

							<div class="accordion-title">Price Filter
								<a class="accordion-btn open" data-toggle="collapse" href="#price-filter"></a>
							</div>

							<div class="accordion-body collapse in" id="price-filter">

								<div class="accordion-body-wrapper">

									<div class="filter-price">

										<div id="price-range"></div>

										<div id="filter-range-details" class="row">

											<div class="col-xs-6">

												<div class="filter-price-label">from
												</div>
												<input type="text" id="price-range-low" class="form-control">
											</div>

											<div class="col-xs-6">

												<div class="filter-price-label">to</div>
												<input type="text" id="price-range-high" class="form-control">
											</div>
										</div>

										<div class="filter-price-action">
											<a href="#" class="btn btn-custom-6 min-width-xss">Ok</a>
											<a href="#" class="btn btn-custom-6 min-width-xs">Clear</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /.accordion-group -->
					</div>
					<!-- /.accordion -->
				</div>
				<!-- /.widget -->

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
@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
	$('#sortBy').change(function(){
		var sort = $('#sortBy').val();
		// alert(sort);
		window.location=" {{url(''.$route.'')}}/{{$categories->slug}}?sort="+sort;
	});
</script>
<!-- <script type="text/javascript">
	function loadmoreData(page){
		$.ajax({
			url: '?page='+page;
			type: 'get',
			beforeSend: function(){
				$('.ajax-load').show();
			},
		});
		.done(function(data){
			if (data.html =='') {
				$('.ajax-load').html('no more product');
				return;
			}
			$('.ajax-load').hide();
			$('#product-data').append(data.html);
		});
		.fail(function(){
			alert('something went wrong! please try again');
		});
	}

	var page=1;
	$(window).scroll(function(){
		if ($(window).scrollTop()+$(window).height()+120>=$(document).height()){
			page++;
			loadmoreData(page);
		}
	});
</script> -->
<!-- Add to cart -->
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
<!-- Add to wishlist -->
<script type="text/javascript">
	$(document).on('click','.add_to_wishlist', function(e){
		e.preventDefault();
		var product_id = $(this).data('id');
		var product_qty = $(this).data('quantity');
		// alert(product_qty);
		var token =" {{csrf_token()}}";
		var path =" {{route('wishlist.store')}} ";

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
				$('#add_to_wishlist_'+product_id).html('<i class="fa fa-spinner"></i>Loading...');
			},
			complete:function(){
				$('#add_to_wishlist_'+product_id).html('<i class="fa fa-heart"></i>Add to cart');
			},
			success:function(data){
				// alert(data['cart_count']);
				console.log(data);
				
				if (data['status']) {
					$('body #header-ajax').html(data['header']);
				$('body #wishlist_counter').html(data['wishlist_count']);
					swal({
					  title: "Good job!",
					  text: data['message'],
					  icon: "success",
					  button: "OK!",
					});
				}
				else if(data['present']){
					$('body #header-ajax').html(data['header']);
				$('body #wishlist_counter').html(data['wishlist_count']);
					swal({
					  title: "Opps!",
					  text: data['message'],
					  icon: "warning",
					  button: "OK!",
					});
				}
				else{
					swal({
					  title: "Sorry!",
					  text: "You can't add product",
					  icon: "error",
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

@endsection