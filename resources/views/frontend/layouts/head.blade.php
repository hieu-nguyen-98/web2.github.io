<title>{{get_settings('title')}}</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="{{get_settings('meta_description')}}">
	<meta name="meta_keywords" content="{{get_settings('meta_keywords')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Hieu Nguyen">

	<!-- Fav icon -->
	<link rel="shortcut icon" href="{{asset(get_settings('favicon'))}}">

	<!-- Font -->
	<link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,900,700,700italic,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Cantata+One' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300,500,700' rel='stylesheet' type='text/css'>
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">

	<!-- Magnific Popup -->
	<link href="{{asset('frontend/css/magnific-popup.css')}}" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/normalize.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/skin-lblue.css')}}">

	<link rel="stylesheet" href="{{asset('frontend/css/ecommerce.css')}}">

	<!-- Owl carousel -->
	<link href="{{asset('frontend/css/owl.carousel.css')}}" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/revolutionslider_settings.css')}}" media="screen" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('frontend/icofont/icofont.min.css')}}">
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="{{asset('frontend/js/vendor/modernizr-2.6.2.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js" integrity="sha512-Gfrxsz93rxFuB7KSYlln3wFqBaXUc1jtt3dGCp+2jTb563qYvnUBM/GP2ZUtRC27STN/zUamFtVFAIsRFoT6/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	@yield('styles')