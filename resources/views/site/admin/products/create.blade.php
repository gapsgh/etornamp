@extends('site.layout')

@section('title')
	Promotegh.com - Add Business
@stop

@section('content')
<div class="main-container">
	<div class="container">
		<div class="row">
			<div class="col-md-9 page-content">
				<div class="inner-box category-content">
					<h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post Your Ghana Made Product/Service</strong></h2>
					<div class="row">
						<div class="col-sm-12">
							<form action="/products" method="POST" class="form-horizontal" enctype="multipart/form-data">
								{{ csrf_field() }}
								<fieldset>	

									<div class="form-group">
										<label class="col-md-3 control-label">Category</label>
										<div class="col-md-8">
											<select name="category_id" id="category-group" required="" class="form-control">
												<option value="0" selected="selected" disabled=""> Select a category...</option>
												@foreach($categories as $cat_lev_1)
													<option value="" style="background-color:#E9E9E9;font-weight:bold; font-size: 20px !important;" disabled="disabled"> - {{$cat_lev_1['name']}} -
													</option>
													@foreach($cat_lev_1['level2'] as $cat_lev_2)
														<option value="{{$cat_lev_2['id']}}"> {{$cat_lev_2['name']}}</option>
													@endforeach
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="Adtitle">Ad title</label>
										<div class="col-md-8">
											<input id="Adtitle" name="name" placeholder="Ad title" class="form-control input-md" required="" type="text">
											<span class="help-block">Keep it short and simple </span>
										</div>
									</div>

									<div class="form-group required">
										<label class="col-md-3 control-label">Product Location <sup>*</sup></label>
										<div class="col-md-5">
											<input name="company_location" id="company_location" placeholder="Select Business Location" value="{{$company_details['location_city']['name']}}" class="form-control input-md" onkeypress="return false;" onkeydown="return false;" type="text" autocomplete="off" required>
											<input type="hidden" name="location_city" id="location_city" value="{{$company_details['location_city']['id']}}">
										</div>
										<div class="col-md-2">
											<a class="btn  btn-primary" data-toggle="modal" href="#changeLocation"><i class=" icon-location-2"></i> Select Location </a>
										</div>

									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="textarea">Describe ad </label>
										<div class="col-md-8">
											<textarea class="form-control" rows="10" id="textarea" name="description" placeholder="Describe what makes your ad unique"></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="Price">Single Price</label>
										<div class="col-md-4">
											<div class="input-group mb10">
												<span class="input-group-addon">GH¢</span>
												<input id="Price" name="single_price" class="form-control" placeholder="Price" required="" type="number">
											</div>
										</div>
										<div class="col-md-4">
											<div class="input-group mb10">
												<span class="input-group-addon">%Off</span>
												<input id="Price" name="bonus_percentage_single" class="form-control" placeholder="Bonus Percentage" type="number">
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="Price">Bulk Price</label>
										<div class="col-md-4">
											<div class="input-group mb10">
												<span class="input-group-addon ">GH¢</span>
												<input id="Price" name="bulk_price" class="form-control" placeholder="Bulk Price" type="number">
											</div>
										</div>
										<div class="col-md-4">
											<div class="input-group mb10">
												<span class="input-group-addon">%Off</span>
												<input id="Price" name="bonus_percentage_bulk" class="form-control" placeholder="Bonus Percentage" type="number">
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Is Your Product Certified</label>
										<div class="col-md-8">
											<label class="radio-inline" for="radios-0">
												<input name="certification_status" id="radios-0" value="1" type="radio">
												Yes 
											</label>
											<label class="radio-inline" for="radios-1">
												<input name="certification_status" id="radios-1" value="0" type="radio" checked="checked">
												No
											</label>
											<span class="help-block">Check Yes if you have the Made In Ghana Logo</span>
										</div>
									</div>


									<hr/>

									<div class="form-group">
										<label class="col-md-3 control-label" for="textarea"> Picture </label>
										<div class="col-md-8">
											<div class="mb10">
												<input id="product_image1" type="file" name="product_image1" class="file" data-preview-file-type="image" required="" accept="image/*">
												<span class="help-block">This Would Be Your Main Image</span>
											</div>
											<div class="mb10">
												<input id="product_image2" type="file" name="product_image2" class="file" data-preview-file-type="image" accept="image/*">
											</div>
											<div class="mb10">
												<input id="product_image3" type="file" name="product_image3" class="file" data-preview-file-type="image" accept="image/*">
											</div>
											<div class="mb10">
												<input id="product_image4" type="file" name="product_image4" class="file" data-preview-file-type="image" accept="image/*">
											</div>
											<p class="help-block">
												Add up to 4 photos. Use a real image of your product.
											</p>
										</div>
									</div>


									<div class="well">
										<h3>
											<i class=" icon-certificate icon-color-1"></i>
											Make your Ad Premium
										</h3>
										<p>
											Premium ads help sellers promote their product or service by getting their ads more visibility with more buyers and sell what they want faster. <i class="icon-phone"></i>Call customer care on 0543414719 for more details
										</p>
										<div class="form-group">
											<table class="table table-hover checkboxtable">
												<tr>
													<td>
														<div class="radio">
															<label>
																<input type="radio" name="premiun_status" id="optionsRadios0" value="0" checked>
																<strong>Regular List </strong> 
															</label>
														</div>
													</td>
													<td><p>GH¢00.00</p></td>
												</tr>
												<tr>
													<td>
														<div class="radio">
															<label>
																<input type="radio" name="premiun_status" id="optionsRadios1" value="1">
																<strong>Urgent Ad </strong> 
															</label>
														</div>
													</td>
													<td>
														<p>
															GH¢3.00
														</p>
													</td>
												</tr>
												<tr>
													<td>
														<div class="radio">
															<label>
																<input type="radio" name="premiun_status" id="optionsRadios2" value="2">
																<strong>Top of the Page Ad </strong> </label>
															</div>
														</td>
														<td>
															<p>
																GH¢5.00
															</p>
														</td>
													</tr>
													<tr>
														<td>
															<div class="radio">
																<label>
																	<input type="radio" name="premiun_status" id="optionsRadios3" value="3">
																	<strong>Top of the Page Ad + Urgent Ad </strong>
																</label>
															</div>
														</td>
														<td>
															<p>
																GH¢10.00
															</p>
														</td>
													</tr>

												</table>
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-4 control-label"></label>
											<div class="col-md-8">

												<button type="submit" class="btn btn-success btn-lg">Submit Product</button>
												
												<label class=" pull-right" for="RET">Save and return to this page?</label>
												<input type="checkbox" id="RET" class="pull-right" name="return_to_page" value="1">
												
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-3 reg-sidebar">
					<div class="reg-sidebar-inner text-center">
						<div class="promo-text-box">
							<i class=" icon-picture fa fa-4x icon-color-1"></i>
							<h3>
								<strong>Post a Free GM Product</strong>
							</h3>
							<p> 
								Post your free online GM ads with us. Our duty is to make sure that your add gets to the maximum number of people in ghana and beyond
							</p>
						</div>
						<div class="panel sidebar-panel">
							<div class="panel-heading uppercase">
								<small>
									<strong>How to sell quickly?</strong>
								</small>
							</div>
							<div class="panel-content">
								<div class="panel-body text-left">
									<ul class="list-check">
										<li> Use a brief title and description of the item</li>
										<li> Make sure you post in the correct category</li>
										<li> Add nice photos to your ad</li>
										<li> Put a reasonable price</li>
										<li> Check the item before publish</li>
										<hr/>
										<li class="uppercase"> Certify your GM product to gain more trust</li>
									</ul>
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
	            	Materialize.toast('<span>{{ session('success_message') }}</span>', 5000, 'btn-success');
	        	}, 1000);
			</script>
			<?php
		}
	?>
	<script type="text/javascript">
		initialize_image_input('product_image1');
		initialize_image_input('product_image2');
		initialize_image_input('product_image3');
		initialize_image_input('product_image4');
	</script>

@stop