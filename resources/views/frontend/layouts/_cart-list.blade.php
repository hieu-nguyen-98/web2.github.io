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
			<th  class="table-title"><i class="icofont-trash" ></i>     
			</th>
		</tr>
	</thead>
	<tbody>
		@foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
		<tr>
			<td class="product-name-col">
				<figure>
					<a href="#"><img src=" {{$item->model->photo}} " alt="Black lace open back dress" width="150" height="150px"></a>
				</figure>
				<h3 class="product-name"><a href=" {{route('product.details',$item->model->slug)}} "> {{$item->name}} </a></h3>
				<ul>
					<li>Color: Black</li>
					<li>Size: XL</li>
				</ul>
			</td>
			<td class="product-price-col">
				<span class="product-price-special">${{$item->price}}</span>
			</td>
			<td>

				<div class="custom-quantity-input quantity">
					<input type="number" data-id="{{$item->rowId}}" class="qty-text"id="qty-input-{{$item->rowId}}" step="1" min="1" max="99" name="quantity" value=" {{$item->qty}}">
					<input type="hidden" data-id="{{$item->rowId}}"data-product-quantity="{{$item->model->stock}}" id="update-cart-{{$item->rowId}}">
				</div>
			</td>
			<td class="product-total-col">
				<span class="product-price-special">${{$item->subtotal}}</span>
			</td>
			<td>
				<i class="icofont-delete cart_delete" data-id="{{$item->rowId}}"></i>
			</td>
		</tr>
		@endforeach
		<tr class="merged">
			<form action="{{route('coupon.add')}}" method="POST" id="coupon-form">
				@csrf
				<td class="checkout-table-title" colspan="4">
					<span><button type="submit" class="coupon-btn btn btn-primary">Apply Coupon</button></span>

				</td>
				<td class="checkout-table-price" colspan="2">
					<input type="text" name="code" class="form-control" placeholder="Coupon">
				</td>
			</form>
		</tr>	
		<tr class="merged">

			<td class="checkout-table-title" colspan="4">

				<span>Subtotal:</span>
			</td>
			<td class="checkout-table-price" colspan="2">${{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}
			</td>
		</tr>
		<tr class="merged">
			<td class="checkout-table-title" colspan="4">

				<span>Save Amount:</span>
			</td>
			<td class="checkout-table-price" colspan="2">$@if(Illuminate\Support\Facades\Session::has('coupon')) {{number_format(Illuminate\Support\Facades\Session::get('coupon')['value'],2)}} @else 0 @endif
			</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td class="checkout-total-title" colspan="4">
				<span>TOTAL:</span>
			</td>
			@if(\Illuminate\Support\Facades\Session::has('coupon'))
			<td class="checkout-total-price cart-total" colspan="2">${{number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal())-\Illuminate\Support\Facades\Session::get('coupon')['value'],2)}} </td>
			@else
			<td class="checkout-total-price cart-total" colspan="2">${{number_format((float)str_replace(',','',\Gloudemans\Shoppingcart\Facades\Cart::subtotal()),2)}} </td>
			@endif
		</tr>
	</tfoot>
</table>
<div class="md-margin half">
</div>
<div class="text-right"><a href="{{route('checkout1')}}" class="btn btn-custom-6 btn-lger min-width-slg">CHECKOUT</a>
</div>