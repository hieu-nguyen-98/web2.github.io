@extends('frontend.layouts.master')
@section('content')
	<main class="main-container">
	<!-- compare content -->
		<!-- Main content starts -->

		<div class="main-block">
			<div class="container">

				<!-- Actual content -->
				<div class="ecommerce pt-40">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<!-- Shopping items content -->
							<div class="shopping-content">
								<!-- Block Title -->

								<!-- Shopping Edit Profile -->
								<div class="shopping-wishlist">
									<!-- Recent Purchase Table -->
									<div class=" table-responsive" id="wishlist_list">
										@include('frontend.layouts._wishlist')
									</div>
									<!-- Pagination -->
									<div class="shopping-pagination">
										<ul class="pagination pull-right">
											<li class="disabled"><a href="#">&laquo;</a></li>
											<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">&raquo;</a></li>
										</ul>
										<div class="clearfix"></div>
									</div>
									<!-- Pagination end-->
								</div>
							</div>
						</div>
					</div>
					<br />
				</div>
			</div>
		</div>

		<!-- Main content ends -->
	<!-- end compare content -->

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

@stop
@section('scripts')
	<script type="text/javascript">
		$('.move-to-cart').on('click', function(e){
			e.preventDefault();
			var rowId = $(this).data('id');
			// alert(rowId);
			var token = "{{csrf_token()}}";
			var path = "{{route('wishlist.move.cart')}}";

			$.ajax({
				url: path,
				type:"POST",
				data:{
					_token:token,
					rowId:rowId,
				},
				beforeSend:function(){
					$(this).html('<i class="fas fa spinner fa-spin"></i> Moving to cart');
				},
				success:function(data){
					if (data['status']) {
						$('body #cart_counter').html(data['cart_count']);
						$('body #wishlist_list').html(data['wishlist_list']);
						$('body #header').html(data['header']);
						swal({
						  title: "Success!",
						  text: data['message'],
						  icon: "success",
						  button: "OK!",
						});
					}
					else{
						swal({
						  title: "Opps!",
						  text: data['message'],
						  icon: "Some thing went wrong!",
						  button: "OK!",
						});
					}
				},
				error:function(err){
					swal({
					  title: "Error!",
					  text: "Some error",
					  icon: "error",
					  button: "OK!",
					});
				}
			});
		});
	</script>
	<script type="text/javascript">
		$('.delete_wishlist').on('click', function(e){
			e.preventDefault();
			var rowId = $(this).data('id');
			// alert(rowId);
			var token = "{{csrf_token()}}";
			var path = "{{route('wishlist.delete')}}";

			$.ajax({
				url: path,
				type:"POST",
				data:{
					_token:token,
					rowId:rowId,
				},
				beforeSend:function(){
					$(this).html('<i class="fas fa spinner fa-spin"></i> Moving to cart');
				},
				success:function(data){
					if (data['status']) {
						$('body #cart_counter').html(data['cart_count']);
						$('body #wishlist_list').html(data['wishlist_list']);
						$('body #header').html(data['header']);
						swal({
						  title: "Success!",
						  text: data['message'],
						  icon: "success",
						  button: "OK!",
						});
					}
					else{
						swal({
						  title: "Opps!",
						  text: data['message'],
						  icon: "Some thing went wrong!",
						  button: "OK!",
						});
					}
				},
				error:function(err){
					swal({
					  title: "Error!",
					  text: "Some error",
					  icon: "error",
					  button: "OK!",
					});
				}
			});
		});
	</script>
@stop