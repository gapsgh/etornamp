@extends('site.layout')

@section('title')
	Promotegh.com - Edit Product
@stop

@section('content')

<div class="main-container">
	<div class="container">
		<div class="row">
			<div class="col-md-9 page-content">
				<div class="inner-box category-content">
					<h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Edit Your Ghana Made Product/Service</strong></h2>
					<div class="row">
						<div class="col-sm-12">
							<form action="/products/{{$product['id']}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
							<input name="_method" type="hidden" value="PUT">
								{{ csrf_field() }}
								<fieldset>	

									<div class="form-group">
										<label class="col-md-3 control-label">Category</label>
										<div class="col-md-8">
											<select name="category_id" id="category-group" required="" class="form-control">
												<option value="0" selected="selected" disabled=""> Select a category...</option>
												<option value="" style="background-color:#E9E9E9;font-weight:bold; font-size: 20px !important;" disabled="disabled"> - Vehicles -
												</option>
												<option value="2"> Cars</option>
												<option value="3"> Commercial vehicles</option>
												<option value="4"> Motorcycles</option>
												<option value="5"> Car &amp; Motorcycle Equipment
												</option>
												<option value="1"> Boats</option>
												<option value="7"> Other Vehicles</option>

											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="Adtitle">Ad title</label>
										<div class="col-md-8">
											<input id="Adtitle" name="name" value="{{$product['name']}}" placeholder="Ad title" class="form-control input-md" required="" type="text">
											<span class="help-block">Keep it short and simple </span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="textarea">Describe ad </label>
										<div class="col-md-8">
											<textarea class="form-control" rows="10" id="textarea" name="description" placeholder="Describe what makes your ad unique">{{$product['description']}}</textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="Price">Single Price</label>
										<div class="col-md-4">
											<div class="input-group mb10">
												<span class="input-group-addon">GH¢</span>
												<input id="Price" value="{{$product['single_price']}}" name="single_price" class="form-control" placeholder="Price" required="" type="number">
											</div>
										</div>
										<div class="col-md-4">
											<div class="input-group mb10">
												<span class="input-group-addon">%Off</span>
												<input id="Price" value="{{$product['bonus_percentage_single']}}" name="bonus_percentage_single" class="form-control" placeholder="Bonus Percentage" type="number">
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label" for="Price">Bulk Price</label>
										<div class="col-md-4">
											<div class="input-group mb10">
												<span class="input-group-addon ">GH¢</span>
												<input id="Price" value="{{$product['bulk_price']}}" name="bulk_price" class="form-control" placeholder="Bulk Price" type="number">
											</div>
										</div>
										<div class="col-md-4">
											<div class="input-group mb10">
												<span class="input-group-addon">%Off</span>
												<input id="Price" value="{{$product['bonus_percentage_bulk']}}" name="bonus_percentage_bulk" class="form-control" placeholder="Bonus Percentage" type="number">
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Is Your Product Certified</label>
										<div class="col-md-8">
											<label class="radio-inline" for="radios-0">
												<input <?php if($product['certification_status'] == 0){ echo 'checked'; } ?> name="certification_status" id="radios-0" value="1" type="radio">
												Yes 
											</label>
											<label class="radio-inline" for="radios-1">
												<input <?php if($product['certification_status'] == 1){ echo 'checked'; } ?> name="certification_status" id="radios-1" value="0" type="radio" >
												No
											</label>
											<span class="help-block">Check Yes if you have the Made In Ghana Logo</span>
										</div>
									</div>


									<hr/>

									<div class="form-group">
										<label class="col-md-3 control-label" for="textarea"> Picture </label>
										<div class="col-md-8">

											@if(count($product_images) > 0)
												<div class="row">
													<div class="col-md-5">
														<img src="/uploads/product_images/{{$product_images[0]['image']}}" width="100%" style="padding: 10px;" />
													</div>

													<div class="col-md-7">
														<div class="mb10">
															<input id="product_image1" type="file" name="product_image1" class="file" data-preview-file-type="image" >
															<span class="help-block">This Would Be Your Main Image</span>
														<input type="hidden" name="product_image1_id" value="{{$product_images[0]['id']}}">
														<input type="hidden" name="product_image1_image" value="{{$product_images[0]['image']}}">
														</div>
													</div>
												</div>
											@else
												<div class="mb10">
													<input id="product_image1" type="file" name="product_image1" class="file" data-preview-file-type="image" required="">
													<span class="help-block">This Would Be Your Main Image</span>
												</div>
											@endif
											
											<hr/>
											
											@if(array_key_exists (1, $product_images) )
												<div class="row">
													<div class="col-md-5">
														<img src="/uploads/product_images/{{$product_images[1]['image']}}" width="100%" style="padding: 10px;" />
													</div>

													<div class="col-md-7">
														<div class="mb10">
															<input id="product_image2" type="file" name="product_image2" class="file" data-preview-file-type="image">
															<input type="hidden" name="product_image2_id" value="{{$product_images[1]['id']}}">
															<input type="hidden" name="product_image2_image" value="{{$product_images[1]['image']}}">
														</div>
													</div>
												</div>
											@else
												<div class="mb10">
													<input id="product_image2" type="file" name="product_image2" class="file" data-preview-file-type="image">
												</div>
											@endif


											@if(array_key_exists (2, $product_images) )
												<div class="row">
													<div class="col-md-5">
														<img src="/uploads/product_images/{{$product_images[2]['image']}}" width="100%" style="padding: 10px;" />
													</div>

													<div class="col-md-7">
														<div class="mb10">
															<input id="product_image3" type="file" name="product_image3" class="file" data-preview-file-type="image">
															<input type="hidden" name="product_image3_id" value="{{$product_images[2]['id']}}">
															<input type="hidden" name="product_image3_image" value="{{$product_images[2]['image']}}">
														</div>
													</div>
												</div>
											@else
												<div class="mb10">
													<input id="product_image3" type="file" name="product_image3" class="file" data-preview-file-type="image">
												</div>
											@endif
											

											@if(array_key_exists (3, $product_images) )
												<div class="row">
													<div class="col-md-5">
														<img src="/uploads/product_images/{{$product_images[3]['image']}}" width="100%" style="padding: 10px;" />
													</div>

													<div class="col-md-7">
														<div class="mb10">
															<input id="product_image4" type="file" name="product_image4" class="file" data-preview-file-type="image">
															<input type="hidden" name="product_image4_id" value="{{$product_images[3]['id']}}">
															<input type="hidden" name="product_image4_image" value="{{$product_images[3]['image']}}">
														</div>
													</div>
												</div>
											@else
												<div class="mb10">
													<input id="product_image4" type="file" name="product_image4" class="file" data-preview-file-type="image">
												</div>
											@endif
											
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
																<input type="radio" name="premiun_status" id="optionsRadios0" value="0" <?php if($product['premiun_status'] == 0){ echo 'checked'; } ?> >
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
																<input type="radio" name="premiun_status" id="optionsRadios1" value="1" <?php if($product['premiun_status'] == 1){ echo 'checked'; } ?> >
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
																<input type="radio" name="premiun_status" id="optionsRadios2" value="2" <?php if($product['premiun_status'] == 2){ echo 'checked'; } ?>>
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
																	<input type="radio" name="premiun_status" id="optionsRadios3" value="3" <?php if($product['premiun_status'] == 3){ echo 'checked'; } ?> >
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