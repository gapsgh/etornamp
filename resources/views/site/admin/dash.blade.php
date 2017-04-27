@extends('site.layout')
@section('title')
	Promotegh.com - Account Dashboard
@stop
@section('content')
<div class="main-container">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 page-sidebar">
				<aside>

					<div class="inner-box">
						<div class="user-panel-sidebar">

							<div class="collapse-box">
								<h5 class="collapse-title no-border"> My Dashboard <a href="#MyClassified" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
								<div class="panel-collapse collapse in" id="MyClassified">
									<ul class="acc-list">
										<li><a class="active" href="{{ route('dashboard_path') }}"><i class="icon-home"></i>
											Personal Home </a>
											</li>
									</ul>
								</div>
							</div>

							<div class="collapse-box">
								<h5 class="collapse-title"> My Ads <a href="#MyAds" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
								<div class="panel-collapse collapse in" id="MyAds">
									<ul class="acc-list">
										<li>
											<a href="account-myads.html">
												<i class="icon-docs"></i> My ads <span class="badge">42</span> 
											</a>
										</li>
										<li>
											<a href="account-favourite-ads.html">
												<i class="icon-heart"></i> Favourite ads <span class="badge">42</span> 
											</a>
										</li>
										<li>
											<a href="account-pending-approval-ads.html">
												<i class="icon-hourglass"></i> Pending approval <span class="badge">42</span>
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
		</div>
		{{-- {{dd($company_details)}} --}}
		<div class="col-sm-9 page-content">
			<div class="inner-box">
				<div class="row">
					<div class="col-md-5 col-xs-4 col-xxs-12">
						<h3 class="no-padding text-center-480 useradmin"><a href="">
							<img class="userImg" src="{{$company_logo_path.$company_details['logo']}}" alt="user"> {{$company_details['name']}}
						</a></h3>
					</div>
					<div class="col-md-7 col-xs-8 col-xxs-12">
						<div class="header-data text-center-xs">

							<div class="hdata">
								<div class="mcol-left">

									<i class="fa fa-eye ln-shadow"></i></div>
									<div class="mcol-right">

										<p><a href="#">7000</a> <em>visits</em></p>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="hdata">
									<div class="mcol-left">

										<i class="icon-th-thumb ln-shadow"></i></div>
										<div class="mcol-right">

											<p><a href="#">12</a><em>Ads</em></p>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="hdata">
										<div class="mcol-left">

											<i class="fa fa-user ln-shadow"></i></div>
											<div class="mcol-right">

												<p><a href="#">18</a> <em>Favorites </em></p>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="inner-box">
							<div class="welcome-msg">
								<h3 class="page-sub-header2 clearfix no-padding">Hello {{ Auth::user()->name }} </h3>
								<span class="page-sub-header-sub small">Welcome to your Dashboard</span>
							</div>
							<div id="accordion" class="panel-group">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="#collapseB1" data-toggle="collapse"> My
											details </a></h4>
										</div>
										<div class="panel-collapse collapse in" id="collapseB1">
											<div class="panel-body">
												<form action="/companies/{{$company_details['id']}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
													<input name="_method" type="hidden" value="PUT">
													{{ csrf_field() }}
													<fieldset>
														<div class="form-group required">
															<label class="col-md-4 control-label">Company/Business Name <sup>*</sup></label>
															<div class="col-md-6">
																<input name="name" value="{{$company_details['name']}}" placeholder="Business Name" class="form-control input-md" required="" type="text">
															</div>
														</div>

														<div class="form-group required">
															<label class="col-md-4 control-label">Registration Number</label>
															<div class="col-md-6">
																<input name="registration_number" value="{{$company_details['registration_number']}}" placeholder="Company Registration Number" class="form-control input-md" type="text">
															</div>
														</div>

														<div class="form-group required">
															<label class="col-md-4 control-label">Address</label>
															<div class="col-md-6">
																<input name="address" value="{{$company_details['address']}}" placeholder="Company Address" class="form-control input-md" type="text">
															</div>
														</div>

														<div class="form-group required">
															<label class="col-md-4 control-label">Working Hours</label>
															<div class="col-md-6">
																<input name="working_hours" value="{{$company_details['working_hours']}}" placeholder="Company Working Hours" class="form-control input-md" type="text">
															</div>
														</div>

														<div class="form-group required">
															<label class="col-md-4 control-label">Phone Number <sup>*</sup></label>
															<div class="col-md-6">
																<input name="number" value="{{$company_details['phone_number']}}" placeholder="Phone Number" class="form-control input-md" type="text">
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-4 control-label" for="textarea">About Business</label>
															<div class="col-md-6">
																<textarea class="form-control" id="textarea" name="other_description">
																	{{$company_details['other_description']}}
																</textarea>
															</div>
														</div>
														<div class="form-group required">
															<label for="inputEmail3" class="col-md-4 control-label">Email
																<sup>*</sup>
															</label>
															<div class="col-md-6">
																<input type="email" value="{{$company_details['email']}}" name="email" class="form-control" id="inputEmail3" placeholder="Email">
															</div>
														</div>

															
														<div class="form-group">
															<label class="col-md-4 control-label"></label>
															<div class="col-md-8">
																<div style="clear:both"></div>
																
																<button type="submit" class="btn btn-primary">
																	Update Business Profile
																</button>
															</div>
														</div>
													</fieldset>
												</form>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title"><a href="#collapseB2" data-toggle="collapse"> Settings </a>
											</h4>
										</div>
										<div class="panel-collapse collapse" id="collapseB2">
											<div class="panel-body">

												<form  action="/companies/{{$company_details['id']}}" method="POST" class="form-horizontal" enctype="multipart/form-data" role="form">
													<input name="_method" type="hidden" value="PUT">
													{{ csrf_field() }}
													<div class="form-group">
														<label class="col-md-3 control-label" for="textarea"> Logo </label>
														<div class="col-md-8">
															<div class="mb10">
																<input id="Comp_logo" name="logo" type="file" class="file" data-preview-file-type="image" accept=".png,.jpg">
															</div>
															<p class="help-block">Update Your Company/Business Logo</p>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-offset-3 col-sm-9">
															<button type="submit" class="btn btn-primary">Update Logo</button>
														</div>
													</div>
												</form>


												</div>
											</div>
										</div>
										
									</div>

								</div>
							</div>

						</div>

					</div>

				</div>
@stop

@section('scripts')

	<script type="text/javascript">
		initialize_image_input('Comp_logo');
	</script>
@stop