<aside>

	<div class="inner-box">
		<div class="user-panel-sidebar">

			<div class="collapse-box">
				<h5 class="collapse-title no-border"> My Dashboard <a href="#MyClassified" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
				<div class="panel-collapse collapse in" id="MyClassified">
					<ul class="acc-list">
						<li>
							<a class="{{Request::path() == 'account/dashboard' ? 'active' : ''}}" href="{{ route('dashboard_path') }}">
								<i class="icon-home"></i> Personal Home 
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="collapse-box">
				<h5 class="collapse-title"> My Ads <a href="#MyAds" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
				<div class="panel-collapse collapse in" id="MyAds">
					<ul class="acc-list">
						<li>
							<a class="{{Request::path() == 'account/dashboard/my-products' ? 'active' : ''}}" href="{{ route('dashboard_myproducts_path') }}">
								<i class="icon-docs"></i>
								 All ads 
								 <span class="badge">
									<?php
									if (isset($products)) {
										echo count($products);
									}
									?>
								</span> 
							</a>
						</li>
						{{-- <li>
							<a href="account-favourite-ads.html">
								<i class="icon-heart"></i> Favourite ads <span class="badge">42</span> 
							</a>
						</li> --}}
						<li>
							<a class="{{Request::path() == 'account/dashboard/pending-approval' ? 'active' : ''}}" href="{{ route('dashboard_unapproved_path') }}">
								<i class="icon-hourglass"></i>
								 Pending approval 
								 <span class="badge">
								 	<?php
									if (isset($unapproved_products)) {
										echo count($unapproved_products);
									}
									?>
								 </span>
							</a>
						</li>
						<li>
							<a class="{{Request::path() == 'account/dashboard/approved-ads' ? 'active' : ''}}" 
								href="{{ route('dashboard_approved_path') }}">
								<i class="icon-check"></i>
								 Approved Ads 
								 <span class="badge">
								 	<?php
									if (isset($approved_products)) {
										echo count($approved_products);
									}
									?>
								 </span>
							</a>
						</li>

					</ul>
				</div>
			</div>

			{{-- <div class="collapse-box">
				<h5 class="collapse-title"> Terminate Account <a href="#TerminateAccount" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
				<div class="panel-collapse collapse in" id="TerminateAccount">
					<ul class="acc-list">
						<li><a href="account-close.html"><i class="icon-cancel-circled "></i> Close
							account </a>
						</li>
					</ul>
				</div>
			</div> --}}

		</div>
	</div>

</aside>