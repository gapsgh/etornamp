<div class="adds-wrapper">

						@foreach($products as $product)

							<div class="item-list">

								@if($product->premiun_status == 1)

									<div class="cornerRibbons urgentAds">
										<a href="{{url(sprintf('product/%d/%s',$product->id,make_slug($product->name)))}}"> Urgent</a>
									</div>

								@elseif($product->premiun_status == 2)

									<div class="cornerRibbons topdAds">
										<a href="{{url(sprintf('product/%d/%s',$product->id,make_slug($product->name)))}}"> Top Ads</a>
									</div>

								@elseif($product->premiun_status == 3)

									<div class="cornerRibbons featuredAds">
										<a href="{{url(sprintf('product/%d/%s',$product->id,make_slug($product->name)))}}"> Featured Ads</a>
									</div>

								@endif
								<div class="col-sm-2 no-padding photobox">
									<div class="add-image">
										<span class="photo-count"><i class="fa fa-camera"></i> {{count($product->image)}} </span>
										<a href="{{url(sprintf('product/%d/%s',$product->id,make_slug($product->name)))}}">
											<img class="thumbnail no-margin" 
												src="@if( count($product->image) > 0 )
													{{url(product_images_path().$product->image[0]->image)}}
													@endif" alt="img">
										</a>
									</div>
								</div>
								<div class="col-sm-7 add-desc-box">
									<div class="add-details">
										<h5 class="add-title">
											<a href="{{url(sprintf('product/%d/%s',$product->id,make_slug($product->name)))}}"> 
												{{ $product->name }}
											</a>
										</h5>
											<span class="info-row"> 
												<span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="" data-original-title="Business Ads">
													B 
												</span>
												 <span class="date">
												 	<i class=" icon-clock"> </i> {{Carbon\Carbon::parse($product->created_at)->diffForHumans()}} 
												 </span> - <span class="category">{{$product->category->name}} </span>- 
												 <span class="item-location"><i class="fa fa-map-marker"></i> {{$product->producr_location_city->name}} </span> 
											</span>
										</div>
									</div>

									<div class="col-sm-3 text-right  price-box">
										<h2 class="item-price"> {{currency_code()}} {{ $product->single_price }} </h2>
										<a class="btn btn-danger  btn-sm make-favorite"> 
											<i class="fa fa-certificate"></i> 
											<span>
												@if($product->premiun_status == 1)
													{{"Urgent"}}
												@elseif($product->premiun_status == 2)
													{{"Top Ads"}}
												@elseif($product->premiun_status == 3)
													{{"Featured Ads"}}
												@endif
											</span> 
										</a> 
									</div>
								</div>
						@endforeach
						
				</div>