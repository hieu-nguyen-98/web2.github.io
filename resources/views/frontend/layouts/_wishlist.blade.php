										<table class="table table-bordered">
											<!-- Table Header -->
											<thead>
											<tr>
												<th>Image</th>
												<th>Name</th>
												<th>Price</th>
												<th>Action</th>
											</tr>
											</thead>
											<tbody>
											@if(\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count() >0)
											@foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content() as $item)
											<tr>
												<!-- Product image -->
												<td>
													<a href="#">
														<img src="{{$item->model->photo}}" alt="" class="img-responsive"/>
													</a>
												</td>
												<td><a href="{{route('product.details',$item->model->slug)}}"> {{$item->name}} </td>
												<td>${{$item->price}}</td>
												<td>
													<div class="btn-group btn-group-xs">
														<a href="javascript:void(0);" data-id="{{$item->rowId}}" class="move-to-cart btn btn-sm btn-default"><i class="fa fa-shopping-cart"></i> </a>
														<button class="btn btn-sm btn-red ml-4"><i class="fa fa-trash-o delete_wishlist" data-id="{{$item->rowId}}"></i> </button>
													</div>
												</td>
											</tr>
											@endforeach
											@else
												<tr>
													<td colspan="4" class="text-center">You don't have any wishlist product!</td>
												</tr>
											@endif
											</tbody>
										</table>