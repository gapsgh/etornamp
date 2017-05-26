<div class="header">
	<nav class="navbar   navbar-site navbar-default" role="navigation" style="background-image: url({{url('/images/hbg2.jpg')}});">
		<div class="container">
			<div class="navbar-header">
				<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
					<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
					<a href="{{ url('/') }}" class="navbar-brand logo logo-title">

						<span class="logo-icon">
							<img src="{{asset('/assets/ico/logot.png')}}">
						</span>
						{{-- Promote<span>GH.com </span>  --}}
					</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li><a href="{{ route('login') }}">Login</a></li>
							<li><a href="{{ route('register') }}">Signup</a></li>
						@else

							<li>
								<a href="#" id="SubmitLink">
									Signout <i class="glyphicon glyphicon-off"></i> 
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
							</li>
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<span>{{ Auth::user()->name }}</span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa"></i>
								</a>
									<ul class="dropdown-menu user-menu">
										<li class="{{Request::path() == 'account/dashboard' ? 'active' : ''}}"><a href="{{ route('dashboard_path') }}"><i class="icon-home"></i> Personal Home
										</a></li>
										<li class="{{Request::path() == 'account/dashboard/my-products' ? 'active' : ''}}">
											<a href="{{ route('dashboard_myproducts_path') }}"><i class="icon-th-thumb"></i>
												 My ads 
											</a>
										</li>
										<li class="{{Request::path() == 'account/dashboard/pending-approval' ? 'active' : ''}}">
											<a href="{{ route('dashboard_unapproved_path') }}">
												<i class="icon-hourglass"></i> Pending approval 	
											</a>
										</li>
										<li class="{{Request::path() == 'account/dashboard/approved-ads' ? 'active' : ''}}">
											<a href="{{ route('dashboard_approved_path') }}">
												<i class="icon-check"></i> Approved Ads 
											</a>
										</li>
										
									</ul>
							</li>
						@endif
						<li class="postadd">
							<a class="btn btn-block   btn-border btn-post btn-danger" href="{{url('/products/create')}}">Post Free Add</a>
						</li>
					</ul>
				</div>

			</div>

		</nav>
	</div>