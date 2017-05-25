@extends('site.layout')
@section('title')
	Promotegh.com - Account Dashboard
@stop
@section('content')
<div class="main-container">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 page-sidebar">
				@include('site.admin.sidebar')
			</div>
		{{-- {{dd($company_details)}} --}}
		<div class="col-sm-9 page-content">
			<div class="inner-box">
				<div class="row">
					<div class="col-md-5 col-xs-4 col-xxs-12">
						<h3 class="no-padding text-center-480 useradmin"><a href="">
							<img class="userImg" src="{{url($company_logo_path.$company_details['logo'])}}" alt="user"> {{$company_details['name']}}
						</a></h3>
					</div>
					<div class="col-md-7 col-xs-8 col-xxs-12">
						<div class="header-data text-center-xs">

							<div class="hdata">
								<div class="mcol-left">

									<i class="fa fa-eye ln-shadow"></i></div>
									<div class="mcol-right">

										<p><a href="#"><?php
														if (isset($visitors)) {
															echo $visitors;
														}else{
															echo '0';
														}
														?></a> <em>visits</em></p>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="hdata">
									<div class="mcol-left">

										<i class="icon-th-thumb ln-shadow"></i></div>
										<div class="mcol-right">

											<p><a href="{{ route('dashboard_myproducts_path') }}">
														<?php
														if (isset($products)) {
															echo count($products);
														}else{
															echo '0';
														}
														?></a><em>Ads</em></p>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="hdata">
										<div class="mcol-left">

											<i class="fa fa-check-square-o ln-shadow"></i></div>
											<div class="mcol-right">

												<p><a href="{{ route('dashboard_approved_path') }}"><?php
																if (isset($approved_products)) {
																	echo count($approved_products);
																}else{
																	echo "0";
																}
																?></a> <em>Approved </em></p>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="inner-box">
							<div class="welcome-msg">
								<div class="row">
									<div class="col-md-8">
										<h3 class="page-sub-header2 clearfix no-padding">Hello {{ Auth::user()->name }} </h3>
										<span class="page-sub-header-sub small">Welcome to your Dashboard</span>
									</div>
									<div class="col-md-4">
										<a class="btn btn-block   btn-border btn-post btn-primary" href="{{url('/products/create')}}">Post Free Add</a>
									</div>
								</div>
								
								
							</div>
							<div id="accordion" class="panel-group">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a style="display: block;" href="#collapseB1" data-toggle="collapse">Basic Settings </a></h4>
										</div>
										<div class="panel-collapse collapse in" id="collapseB1">
											<div class="panel-body">
												<form action="{{url(sprintf('companies/%d',$company_details['id']))}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
															<label class="col-md-4 control-label">Company/Business Location <sup>*</sup></label>
															<div class="col-md-4">
																<input name="company_location" id="company_location" placeholder="Select Business Location" value="{{$company_details['location_city']['name']}}" class="form-control input-md" onkeypress="return false;" onkeydown="return false;" type="text" autocomplete="off" required>
																<input type="hidden" name="location_city" id="location_city" value="{{$company_details['location_city']['id']}}">
															</div>
															<div class="col-md-2">
																<a class="btn  btn-primary" data-toggle="modal" href="#changeLocation"><i class=" icon-location-2"></i> Select Location </a>
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
															<div class="col-md-5">
																<input name="number" value="{{$company_details['phone_number']}}" placeholder="Phone Number" class="form-control input-md" type="text">
															</div>

															<div class="col-md-1">
																<label class="checkbox-inline" for="on_whatsapp">
																	<input name="on_whatsapp" id="on_whatsapp" value="1" type="checkbox" <?php if($company_details['on_whatsapp'] =='1'){
																		echo "checked";
																		} ?> >
																		<i class="fa fa-whatsapp fa-2x" style="color: green;"></i>
																</label>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-4 control-label" for="textarea">About Business</label>
															<div class="col-md-6">
																<textarea class="form-control" id="textarea" name="other_description">{{$company_details['other_description']}}</textarea>
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
															<label class="col-md-3 control-label">Registered As</label>
															<div class="col-md-8">
																<label class="radio-inline" for="radios-0">
																	<input name="account_type" id="radios-0" value="1" type="radio" <?php if($company_details['account_type'] =='1'){
																		echo "checked";
																		} ?> >
																	<strong>A Seller </strong>
																</label>
																<label class="radio-inline" for="radios-1">
																	<input name="account_type" id="radios-1" value="2" type="radio" <?php if($company_details['account_type'] =='2'){
																		echo "checked";
																		} ?> >
																	<strong>A Make/Producer</strong>
																</label>
																<span class="help-block">Specify whether you produce the product or just sell them</span>
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
											<h4 class="panel-title"><a style="display: block;" href="#collapseB2" data-toggle="collapse">Logo Settings </a>
											</h4>
										</div>
										<div class="panel-collapse collapse" id="collapseB2">
											<div class="panel-body">

												<form  action="{{url(sprintf('companies/%d',$company_details['id']))}}" method="POST" class="form-horizontal" enctype="multipart/form-data" role="form">
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

															<input type="hidden" name="update_logo" value="1">
															<button type="submit" class="btn btn-primary">Update Logo</button>
														</div>
													</div>
												</form>


												</div>
											</div>
										</div>

										<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title"><a style="display: block;" href="#collapseB3" data-toggle="collapse">Map Settings </a>
											</h4>
										</div>
										<div class="panel-collapse" id="collapseB3">
											<div class="panel-body">

												<form  action="{{url(sprintf('companies/%d',$company_details['id']))}}" method="POST" class="form-horizontal" enctype="multipart/form-data" role="form">
													<input name="_method" type="hidden" value="PUT">
													{{ csrf_field() }}
													<div class="form-group">
														<label for="searchmap" class="col-md-4 control-label">Search Your Location
														</label>
														<div class="col-md-6">
															<input id="searchmap" class="form-control" type="text">
														</div>
													</div>
													
													<div class="form-group">
														<sup style="color: #318434; text-align: center;">Move Position Marker To The Location Of Your Business/Shop</sup>
														<div class="col-md-12" id="map-canvas" style="height: 250px;"></div>
													</div>

													<div class="form-group">
														<label for="searchmap" class="col-md-3 control-label">Your Map Coordinates</label>
														<div class="col-md-4">
															<label for="lat" class="col-md-2 control-label">Lat</label>
															<div class="col-md-10">
																<input id="lat" class="form-control input-md" name="lat" type="text" readonly="">
															</div>
														</div>
														<div class="col-md-4">
															<label for="lat" class="col-md-2 control-label">Lng</label>
															<div class="col-md-10">
																<input id="lng" class="form-control input-md" name="lng" type="text" readonly="">
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-offset-5 col-sm-12">
															<button type="submit" class="btn btn-primary">Update Location</button>
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

					@include('site.location_modal')

				</div>

				
@stop

@section('scripts')
<?php 
		if(session('success_message')){
			?>
			<script type="text/javascript">
				setTimeout(function() {
	            	Materialize.toast('<span><b>{{ session('success_message') }}</b></span>', 6000, 'btn-success');
	        	}, 600);
			</script>
			<?php
		}
	?>
	<script type="text/javascript">
		initialize_image_input('Comp_logo');

		@if(trim($company_details['location']['lng'])  !='' )
			var pos = {
			      	lat:{{$company_details['location']['lat']}},
			      	lng:{{$company_details['location']['lng']}}
			      };
			     create_map(pos);
		@else
			var pos = {
		      	lat:5.6037168,
		      	lng:-0.1869644
		      };
		    // Try HTML5 geolocation.
		    if (navigator.geolocation) {
		      navigator.geolocation.getCurrentPosition(function(position) {
		      	//set the mapto the current location
		         var currentpos = {
		          lat: position.coords.latitude,
		          lng: position.coords.longitude
		        };
		        create_map(currentpos);

		      }, function() {
		        //set the map to the default location if location fails
		       create_map(pos);
		      });
		    } else {
		      // Browser doesn't support Geolocation
		      // set the map to the default location 
		      create_map(pos);
		    }
		@endif
		
	</script>
@stop