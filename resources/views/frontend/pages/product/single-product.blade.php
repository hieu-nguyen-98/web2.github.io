					@foreach($products as $item)
					<div class="col-xs-12 col-sm-6 col-md-4 product-item filter-best">
						<div class="product-img">
							<img src="{{$item->photo}}" alt="product" width="300" height="350" >

							<div class="product-hover">
								<div class="product-cart">
									<a class="btn btn-secondary btn-block add_to_cart" data-quantity="1" data-product-id="{{$item->id}}" id="add_to_cart{{$item->id}}" href="">Add To Cart</a>

								</div>
							</div>
						</div>
						<!-- .product-img end -->
						<div class="product-bio">
							<h4>
								<p class="brand_name">{{\App\Models\Brand::where('id',$item->brand_id)->value('title')}}</p>
								<a href="#"> {{$item->title}} </a>
							</h4>
							<p class="product-price">${{(number_format($item->offer_price))}} <small class="text-danger"><del> ${{number_format($item->price)}} </del></small> <a href="javascript:void(0);" class="add_to_wishlist" data-quantity="1" data-id="{{$item->id}}" id="add_to_wishlist_{{$item->id}}"><i class="fa fa-heart square-2 rounded-1"></i></a></p>
						</div>
						<!-- .product-bio end -->

					</div>
					@endforeach
					  {{ $products->links() }}