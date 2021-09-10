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
								<div class="accordion-group panel">

									<div class="container">
										<h2 class="accordion-title mb-0">
											<span>5. Confirm Order</span>
											<a class="accordion-btn open" data-toggle="collapse" href="#collapse-five"></a></h2>
											<div class="accordion-body collapse in" id="collapse-five">

												<div class="row accordion-body-wrapper">

													<div class="col-md-12" id="cart_list">
														@include('frontend.layouts._cart-list')
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


	</main>
	@endsection
	@section('scripts')
	<script>
		$(document).ready(function(){
			$(".cart_delete").click(function(){
				var cart_id = $(this).data('id');
        	// alert(cart_id);
        	var token =" {{csrf_token()}}";
        	var path =" {{route('cart.delete')}} ";
        	$.ajax({
        		url:path,
        		type:"POST",
        		dataType:"JSON",
        		data:{
        			cart_id:cart_id,
        			_token:token,
        		},
        		success:function(data){
					// alert(data['cart_count']);
					console.log(data);
					$('body #header-ajax').html(data['header']);
					$('body #cart-counter').html(data['cart_count']);
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
		});
	</script>
	<script>
		$(document).on('click','.qty-text', function(){
			var id=$(this).data('id');
		// alert(id);
		var spinner = $(this),input=spinner.closest("div.quantity").find('input[type=number]');
		// alert(input.val());
		if (input.val()==1) {
			return false;
		}
		if (input.val()!=1) {
			var newVal=parseFloat(input.val());
			$('#qty-input-'+id).val(newVal);
		}
		var productQuantity = $("#update-cart-"+id).data('product-quantity');
		update_cart(id,productQuantity);
		// alert(productQuantity);
	});
		function update_cart(id,productQuantity){
			var rowId = id;
			var product_qty = $('#qty-input-'+rowId).val();
			var token = " {{csrf_token()}} ";
			var path = " {{route('cart.update')}} ";
		// alert(product_qty);

		$.ajax({
			url : path,
			type: "post",
			data:{
				_token:token,
				product_qty:product_qty,
				rowId:rowId,
				productQuantity:productQuantity,
			},
			success:function(data){
				console.log(data);
				if (data['status']) {
					$('body #header-ajax').html(data['header']);
					$('body #cart_counter').html(data['cart_count']);
					$('body #cart_list').html(data['cart_list']);
					swal({
						title: "Good job!",
						text: data['message'],
						icon: "success",
						button: "OK!",
					});
						// alert(data['message']);
					}else{
						alert(data['message']);
					} 
				}
			});
	}
</script>
<script >
	$(document).on('click','.coupon-btn', function(e){
		e.preventDefault();
		var code = $('input[name=code]').val();
		// alert(code);
		$('.coupon-btn').html('<i class="fas fa-spinner fa-spin"></i>Appling...');
		$('#coupon-form').submit();
	});
</script>
@endsection