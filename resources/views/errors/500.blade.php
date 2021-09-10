@extends('frontend.layouts.master')
@section('content')
<main class="main-container">

	<section class="ui-not-found">
	<!-- start of page content -->

	<!--not found area start-->
	<div class="ui-not-found-page">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="primary" class="content-area padding-content white-color">
						<div id="main" class="site-main">

							<section class="error-404 not-found text-center">
								<h1 class="404">500</h1>

								<p class="lead">Sorry, we could not found the page you are looking for!</p>

								<div class="row">
									<div class="col-sm-4 col-sm-offset-4">
										<form role="search" method="get" id="searchform" action="#">
											<div>
												<input type="text" placeholder="Search and hit enter..." name="s" id="s" />
											</div>
										</form>
										<p class="go-back-home"><a href=" {{route('/')}} ">
											Back to Home Page</a></p>
									</div>
								</div>

							</section>
							<!-- .error-404 -->

						</div>
						<!-- #main -->
					</div>
					<!-- #primary -->
				</div>
			</div>
		</div>
	</div>
	<!--registration area end-->
</section>
</main>

@endsection