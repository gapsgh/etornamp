<div class="header">
	<nav class="navbar   navbar-site navbar-default" role="navigation">
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
								<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
										<li class="active"><a href="{{ route('dashboard_path') }}"><i class="icon-home"></i> Personal Home
										</a></li>
										<li><a href="account-myads.html"><i class="icon-th-thumb"></i> My ads </a></li>
										<li><a href="account-favourite-ads.html"><i class="icon-heart"></i> Favourite ads </a>
										</li>
										<li><a href="account-saved-search.html"><i class="icon-star-circled"></i> Saved search
										</a></li>
										<li><a href="account-archived-ads.html"><i class="icon-folder-close"></i> Archived ads
										</a></li>
										<li><a href="account-pending-approval-ads.html"><i class="icon-hourglass"></i> Pending
											approval </a>
										</li>
										<li><a href="statements.html"><i class=" icon-money "></i> Payment history </a></li>
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