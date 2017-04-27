<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@include('site.links')
	
	<title>@yield('title', 'Promotegh.com')</title>

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script>
    	paceOptions = {
    		elements: true
    	};
    </script>
    <script src="{{asset('/assets/js/pace.min.js')}}"></script>
</head>
<body>
	<div id="wrapper">
		@include('site.header')

					<div class="conainner">
						@yield('content')

					</div>

					<div class="page-info hasOverly" style="background: url({{asset('/images/bg.jpg')}}); background-size:cover">
						<div class="bg-overly">
							<div class="container text-center section-promo">
								<div class="row">
									<div class="col-sm-3 col-xs-6 col-xxs-12">
										<div class="iconbox-wrap">
											<div class="iconbox">
												<div class="iconbox-wrap-icon">
													<i class="icon  icon-group"></i>
												</div>
												<div class="iconbox-wrap-content">
													<h5><span>2200</span></h5>
													<div class="iconbox-wrap-text">Trusted Seller</div>
												</div>
											</div>

										</div>

									</div>
									<div class="col-sm-3 col-xs-6 col-xxs-12">
										<div class="iconbox-wrap">
											<div class="iconbox">
												<div class="iconbox-wrap-icon">
													<i class="icon  icon-th-large-1"></i>
												</div>
												<div class="iconbox-wrap-content">
													<h5><span>100</span></h5>
													<div class="iconbox-wrap-text">Categories</div>
												</div>
											</div>

										</div>

									</div>
									<div class="col-sm-3 col-xs-6  col-xxs-12">
										<div class="iconbox-wrap">
											<div class="iconbox">
												<div class="iconbox-wrap-icon">
													<i class="icon  icon-map"></i>
												</div>
												<div class="iconbox-wrap-content">
													<h5><span>700</span></h5>
													<div class="iconbox-wrap-text">Location</div>
												</div>
											</div>

										</div>

									</div>
									<div class="col-sm-3 col-xs-6 col-xxs-12">
										<div class="iconbox-wrap">
											<div class="iconbox">
												<div class="iconbox-wrap-icon">
													<i class="icon icon-facebook"></i>
												</div>
												<div class="iconbox-wrap-content">
													<h5><span>50,000</span></h5>
													<div class="iconbox-wrap-text"> Facebook Fans</div>
												</div>
											</div>

										</div>

									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="page-bottom-info">
						<div class="page-bottom-info-inner">
							<div class="page-bottom-info-content text-center">
							<h1>If you have any questions, comments or concerns, please call the PROMOTEGH.COM Advertising department </h1>
									<a class="btn  btn-lg btn-primary-dark" href="tel:+000000000">
										<i class="icon-mobile"></i> <span class="hide-xs color50">Call Now:</span> (+233) 54-3414-719 </a>
									</div>
								</div>
							</div>
							<div class="footer" id="footer">
								<div class="container">
									<ul class=" pull-left navbar-link footer-nav">
										<li><a href="index.html"> Home </a> <a href="about-us.html"> About us </a> <a href="#"> Terms and
											Conditions </a> <a href="#"> Privacy Policy </a> <a href="contact.html"> Contact us </a> <a href="faq.html"> FAQ </a>
										</ul>
										<ul class=" pull-right navbar-link footer-nav">
											<li> &copy; 2017 PROMOTEGH.COM</li>
										</ul>
									</div>
								</div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="{{asset('/assets/bootstrap/js/bootstrap.min.js')}}"></script>

	<script src="{{asset('/assets/js/owl.carousel.min.js')}}"></script>

	<script src="{{asset('/assets/js/jquery.matchHeight-min.js')}}"></script>

	<script src="{{asset('/assets/js/hideMaxListItem.js')}}"></script>

	<script src="{{asset('/assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js')}}"></script>
	<script src="{{asset('/assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js')}}"></script>

	<script src="{{asset('/assets/js/script.js')}}"></script>
	<script>


	</script>

	<script type="text/javascript" src="{{asset('/assets/plugins/autocomplete/jquery.mockjax.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/plugins/autocomplete/jquery.autocomplete.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/plugins/autocomplete/usastates.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/plugins/autocomplete/autocomplete-demo.js')}}"></script>
	<script src="{{asset('/assets/js/fileinput.min.js')}}" type="text/javascript"></script>
	
    <script type="text/javascript" src="{{asset('/assets/js/materialize.min.js')}}"></script>

	<script type="text/javascript">
		function initialize_image_input(input_id) {
        $("#"+input_id).fileinput({
            'showUpload':false,
            'maxFileSize':2000,
            'allowedFileTypes':['image'],
            'allowedFileExtensions':['jpg', 'png'],
            'allowedPreviewTypes':['image'],
            'previewFileType':'image'
        });
    }
	</script>
	<script type="text/javascript">
    // Toast Notification
    $(window).load(function() {
        setTimeout(function() {
            Materialize.toast('<span>Hiya! I am a toast.</span>', 1500);
        }, 3000);
        setTimeout(function() {
            Materialize.toast('<span>You can swipe me too!</span>', 355555000);
        }, 5500);
        setTimeout(function() {
            Materialize.toast('<span>You have new order.</span><a class="btn-flat yellow-text" href="#">Read<a>', 3000);
        }, 18000);
    });
    
    </script>
	@yield('scripts')

</body>
</html>