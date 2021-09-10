	<!-- Top bar starts -->
	<div class="top-bar" id="header-ajax">
		<div class="container">

			<!-- Contact starts -->
			<div class="tb-contact pull-left">
				<!-- Email -->
				<i class="fa fa-envelope color"></i> &nbsp; <a href="mailto:contact@domain.com">{{\App\Models\Settings::value('email')}}</a>
				&nbsp;&nbsp;
				<!-- Phone -->
				<i class="fa fa-phone color"></i> &nbsp; {{\App\Models\Settings::value('phone')}}
			</div>
			<!-- Contact ends -->

			<!-- Shopping kart starts -->
			<div class="tb-shopping-cart pull-right">
				<!-- Link with badge -->
				<a href="" class="btn btn-white btn-xs b-dropdown"><i class="fa fa-shopping-cart"></i> <i class="fa fa-angle-down color"></i> <span class="badge badge-color cart_quantity" id="cart-counter"> {{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}} </span></a>
				<!-- Dropdown content with item details -->
				<div class="b-dropdown-block">
					<!-- Heading -->
					<h4><i class="fa fa-shopping-cart color"></i> Your Items</h4>
					<ul class="list-unstyled">
						<!-- Item 1 -->
						@foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
						<li>
							<!-- Item image -->
							<div class="cart-img">
								<a href=""><img src="{{$item->model->photo}}" alt="" class="img-responsive" /></a>
							</div>
							<!-- Item heading and price -->
							<div class="cart-title">
								<h5><a href=" {{route('product.details',$item->model->slug)}} ">{{$item->name}}</a></h5>
								<!-- Item price -->
								<p> {{$item->qty}} x - <span class="label label-color label-sm">${{number_format($item->price)}}</span>
									<a class="cart_delete" data-id="{{$item->rowId}}" style="float: right;"  ><i class="icofont-trash" style="margin-right:15px"></i></a>

								</p>
							</div>
							<div class="clearfix"></div>
						</li>
						@endforeach
					</ul>
					<ul class="list-unstyled">
						<li>
							<span class="text-danger">Sub Total:</span>
							<span>$ {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} </span>
						</li>
						<li>
							<span class="text-danger">Total:</span>
							@if(session()->has('coupon'))
							<span>${{number_format((float) str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-\Illuminate\Support\Facades\Session::get('coupon')['value'],2)}} </span>
							@else
							<span>$ {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} </span>
							@endif
						</li>
					</ul>
					<a href=" {{route('cart')}} " class="btn btn-white btn-sm">View Cart</a> &nbsp; <a href="{{route('checkout1')}}" class="btn btn-color btn-sm">Checkout</a>
				</div>
			</div>
			<!-- Shopping kart ends -->

			<!-- Langauge starts -->
			<div class="tb-language dropdown pull-right">
				@if(auth()->user())
				<img src=" {{auth()->user()->photo}}" width="30" height="30">
				<!-- <a href="#" data-target="#" data-toggle="dropdown">English <i class="fa fa-angle-down color"></i></a> -->
				@else
				<img src=" {{Helper::userDefaultImage()}} "  width="30" height="30">
				<!-- <a href="#" data-target="#" data-toggle="dropdown">English <i class="fa fa-angle-down color"></i></a> -->
				@endif
				<!-- Dropdown menu with languages -->
				<ul class="dropdown-menu dropdown-mini" role="menu">
					<li><a href="#">Germany</a></li>
					<li><a href="#">France</a></li>
					<li><a href="#">Brazil</a></li>
				</ul>
			</div>
			<!-- Language ends -->

			<!-- Search section for responsive design -->
			<div class="tb-search pull-left">
				<a href="#" class="b-dropdown"><i class="fa fa-search square-2 rounded-1 bg-color white"></i></a>
				<div class="b-dropdown-block">
					<form>
						<!-- Input Group -->
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Type Something">
							<span class="input-group-btn">
								<button class="btn btn-color" type="button">Search</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<!-- Search section ends -->

			<!-- Social media starts -->
			<div class="tb-social pull-right">
				<div class="brand-bg text-right">
					<!-- Brand Icons -->
					<a href="{{\App\Models\Settings::value('facebook_url')}}" class="facebook"><i class="fa fa-facebook square-2 rounded-1"></i></a>
					<a href="{{\App\Models\Settings::value('twitter_url')}}" class="twitter"><i class="fa fa-twitter square-2 rounded-1"></i></a>
					<a href="{{\App\Models\Settings::value('pinterest')}}" class="google-plus"><i class="fa fa-google-plus square-2 rounded-1"></i></a>
					<a href="{{route('wishlist')}}" id="wishlist_counter"><i class="fa fa-heart square-2 rounded-1">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count()}}</i></a>
				</div>
			</div>
			<!-- Social media ends -->

			<div class="clearfix"></div>
		</div>
	</div>

	<!-- Top bar ends -->

	<!-- Header One Starts -->
	<div class="header-1">

		<!-- Container -->
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<!-- Logo section -->
					<div class="logo">
						<h1><a href=" {{route('/')}} "><i class="fa fa-bookmark-o"></i> {{\App\Models\Settings::value('title')}}</a></h1>
					</div>
				</div>
				<div class="col-md-6 col-md-offset-2 col-sm-5 col-sm-offset-3 hidden-xs">
					<!-- Search Form -->
					<div class="header-search">
						<form>
							<!-- Input Group -->
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Type Something">
								<span class="input-group-btn">
									<button class="btn btn-color" type="button">Search</button>
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Navigation starts -->

		<div class="navi">
			<div class="container">
				<div class="navy">
					<ul>
						<!-- Main menu -->
						<li><a href="{{route('/')}}">Home</a>
						</li>

						<li><a href="{{route('shop')}}">Shop</a>
						</li>

						<li><a href="">Brands</a>
							<ul>
								
								<li><a href=""></a>
								</li>

								<!-- Multi level menu -->
							</ul>
						</li>

						<li><a href="{{route('blog')}}">Blog</a>
						</li>
						<li><a href="">Login & Regester</a>
							<ul>
								@auth
								<li><a href=" {{route('user.dashboard')}} "><span>My Acount</span></a></li>
								<li><a href="{{route('user.order')}}"><span>Orders List</span></a></li>
								
								<li><a href="{{route('user.logout')}}"><i class="fas fa-logout"></i>Logout</a></li>
								@else
								<li><a href=" {{route('user.auth')}} ">Login & Register</a></li>
								@endauth

							</ul>
						</li>

						<li><a href="{{route('about')}}">About Us</a></li>
						<li><a href="{{route('contact')}}">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Navigation ends -->

	</div>

	<!-- Header one ends -->

