<!DOCTYPE html>

<html class="no-js">
<head>
	@include('frontend.layouts.head')
</head>

<body class="style-14">

<header id="header-ajax" >
<!-- start header -->
	@include('frontend.layouts.header')
</header>
<!-- end header -->
<div class="row">
	<div class="col-md-12">
		@include('backend.layouts.notifcation')
	</div>
</div>
<!-- start main content -->
 @yield('content')
<!-- end main content -->



<!-- start footer area -->
@include('frontend.layouts.footer')
<!-- footer area end -->

@include('frontend.layouts.script')
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
</body>
</html>