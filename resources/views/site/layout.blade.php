<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('/assets/ico/apple-touch-icon-144-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('/assets/ico/apple-touch-icon-114-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('/assets/ico/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="{{asset('/assets/ico/favicon.png')}}">
	<title>Welcome To Promotegh.com</title>

	<link href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

	<link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">

	<link href="{{asset('/assets/css/owl.carousel.css')}}" rel="stylesheet">
	<link href="{{asset('/assets/css/owl.theme.css')}}" rel="stylesheet">


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
		<div class="header">
			<nav class="navbar   navbar-site navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
							<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
							<a href="#" class="navbar-brand logo logo-title">

								<span class="logo-icon">
								<img src="{{asset('/assets/ico/logot.png')}}">
								</span>
								{{-- Promote<span>GH.com </span>  --}}
							</a>
					</div>
								<div class="navbar-collapse collapse">
									<ul class="nav navbar-nav navbar-right">
										<li><a href="">Login</a></li>
										<li><a href="">Signup</a></li>
										<li class="postadd">
											<a class="btn btn-block   btn-border btn-post btn-danger" href="#">Post Free Add</a>
										</li>
									</ul>
								</div>

							</div>

						</nav>
					</div>

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
</body>
</html>