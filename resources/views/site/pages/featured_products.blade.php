@extends('site.layout')

@section('title')
	Welcome to Promotegh.com
@stop
@section('content')
<div class="main-container">
	<div class="container">
	
		<div class="col-sm-9 col-thin-left page-content ">
			<div class="category-list">
				<div class="tab-box ">

					<ul class="nav nav-tabs add-tabs" role="tablist">
						<li class="active">
							<a href="#allAds" role="tab" data-toggle="tab"> 	All Featured Products
								<span class="badge">{{$featured_products->total()}}</span>
							</a>
						</li>
					</ul>
					</div>

					<div class="listing-filter">
						<div class="pull-left col-xs-6">
							<div class="breadcrumb-list"><a href="#" class="current">
								
							</div>
							</div>
							<div class="pull-right col-xs-6 text-right listing-view-action">
								<span class="list-view active"><i class="  icon-th"></i></span> 
								<span class="compact-view"><i class=" icon-th-list  "></i></span> 
								<span class="grid-view "><i class=" icon-th-large "></i></span>
							</div>
							<div style="clear:both"></div>
						</div>

						<div class="adds-wrapper">

						@foreach($featured_products as $f_product)

							<div class="item-list">

								@if($f_product->premiun_status == 1)

									<div class="cornerRibbons urgentAds">
										<a href="#"> Urgent</a>
									</div>

								@elseif($f_product->premiun_status == 2)

									<div class="cornerRibbons topdAds">
										<a href="#"> Top Ads</a>
									</div>

								@elseif($f_product->premiun_status == 3)

									<div class="cornerRibbons featuredAds">
										<a href="#"> Featured Ads</a>
									</div>

								@endif
								<div class="col-sm-2 no-padding photobox">
									<div class="add-image">
										<span class="photo-count"><i class="fa fa-camera"></i> {{count($f_product->image)}} </span>
										<a href="ads-details.html">
											<img class="thumbnail no-margin" 
												src="@if( count($f_product->image) > 0 )
													{{product_images_path().$f_product->image[0]->image}}
													@endif" alt="img">
										</a>
									</div>
								</div>
								<div class="col-sm-7 add-desc-box">
									<div class="add-details">
										<h5 class="add-title">
											<a href="ads-details.html"> 
												{{ $f_product->name }}
											</a>
										</h5>
											<span class="info-row"> 
												<span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="" data-original-title="Business Ads">
													B 
												</span>
												 <span class="date">
												 	<i class=" icon-clock"> </i> {{Carbon\Carbon::parse($f_product->created_at)->diffForHumans()}} 
												 </span> - <span class="category">{{$f_product->category->name}} </span>- 
												 <span class="item-location"><i class="fa fa-map-marker"></i> New York </span> 
											</span>
										</div>
									</div>

									<div class="col-sm-3 text-right  price-box">
										<h2 class="item-price"> GH {{ $f_product->single_price }} </h2>
										<a class="btn btn-danger  btn-sm make-favorite"> 
											<i class="fa fa-certificate"></i> 
											<span>
												@if($f_product->premiun_status == 1)
													{{"Urgent"}}
												@elseif($f_product->premiun_status == 2)
													{{"Top Ads"}}
												@elseif($f_product->premiun_status == 3)
													{{"Featured Ads"}}
												@endif
											</span> 
										</a> 
									</div>
								</div>
						@endforeach
							

								
						</div>

					<div class="tab-box  save-search-bar text-center">
						{{-- <a href=""> 
							<i class=" icon-plus"></i> Follow User 
						</a> --}}
					</div>
					</div>
					<div class="pagination-bar text-center">
						{!! $featured_products->links() !!}
					</div>

					<div class="post-promo text-center">
						<h2> Do you get Ghana Made Product for sell ? </h2>
						<h5>Sell your products here FOR FREE. It's easier than you think !</h5>
						<a href="{{url('/products/create')}}" class="btn btn-lg btn-border btn-post btn-danger">
							Post a Free GM Product 
						</a>
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
								<div class="panel-heading">Safety Tips for Buyers</div>
								<div class="panel-content">
									<div class="panel-body text-left">
										<ul class="list-check">
											<li> Meet seller at a public place</li>
											<li> Check the item before you buy</li>
											<li> Pay only after collecting the item</li>
										</ul>
										<p><a class="pull-right" href="#"> Know more <i class="fa fa-angle-double-right"></i> </a></p>
									</div>
								</div>
							</div>
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

@stop