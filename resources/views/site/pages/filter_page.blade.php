@extends('site.layout')

@section('title')
	Welcome to Promotegh.com
@stop
@section('content')

<div class="main-container">
<div class="container">
<div class="row">
 
<div class="col-sm-3 page-sidebar mobile-filter-sidebar">
<aside>
<div class="inner-box">
{{-- <div class="categories-list  list-filter">
<h5 class="list-title"><strong><a href="#">All Categories</a></strong></h5>
<ul class=" list-unstyled">
<li>
<a href="sub-category-sub-location.html"><span class="title">Electronics</span><span class="count">&nbsp;8626</span></a>
</li>
</ul>
</div> --}}
 
<div class="locations-list  list-filter">
<h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
<ul class="browse-list list-unstyled long-list">
<li><a href="sub-category-sub-location.html"> Atlanta </a></li>
<li><a href="sub-category-sub-location.html"> Wichita </a></li>
<li><a href="sub-category-sub-location.html"> Anchorage </a></li>
<li><a href="sub-category-sub-location.html"> Dallas </a></li>
<li><a href="sub-category-sub-location.html">New York </a></li>
<li><a href="sub-category-sub-location.html"> Santa Ana/Anaheim </a></li>
<li><a href="sub-category-sub-location.html"> Miami </a></li>
<li><a href="sub-category-sub-location.html"> Virginia Beach </a></li>
<li><a href="sub-category-sub-location.html"> San Diego </a></li>
<li><a href="sub-category-sub-location.html"> Boston </a></li>
<li><a href="sub-category-sub-location.html"> Houston </a></li>
<li><a href="sub-category-sub-location.html">Salt Lake City </a></li>
<li><a href="sub-category-sub-location.html"> Other Locations </a></li>
</ul>
</div>
 
<div class="locations-list  list-filter">
<h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>
<form role="form" class="form-inline ">
<div class="form-group col-sm-4 no-padding">
<input type="text" placeholder="$ 2000 " id="minPrice" class="form-control">
</div>
<div class="form-group col-sm-1 no-padding text-center hidden-xs"> -</div>
<div class="form-group col-sm-4 no-padding">
<input type="text" placeholder="$ 3000 " id="maxPrice" class="form-control">
</div>
<div class="form-group col-sm-3 no-padding">
<button class="btn btn-default pull-right btn-block-xs" type="submit">GO
</button>
</div>
</form>
<div style="clear:both"></div>
</div>
 
<div class="locations-list  list-filter">
<h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
<ul class="browse-list list-unstyled long-list">
<li><a href="sub-category-sub-location.html"><strong>All Ads</strong> <span class="count">228,705</span></a></li>
<li><a href="sub-category-sub-location.html">Business <span class="count">28,705</span></a></li>
<li><a href="sub-category-sub-location.html">Personal <span class="count">18,705</span></a></li>
</ul>
</div>
 
{{-- <div class="locations-list  list-filter">
<h5 class="list-title"><strong><a href="#">Condition</a></strong></h5>
<ul class="browse-list list-unstyled long-list">
<li><a href="sub-category-sub-location.html">New <span class="count">228,705</span></a>
</li>
<li><a href="sub-category-sub-location.html">Used <span class="count">28,705</span></a>
</li>
<li><a href="sub-category-sub-location.html">None </a></li>
</ul>
</div> --}}
 
<div style="clear:both"></div>
</div>
 
</aside>
</div>
 
<div class="col-sm-9 page-content col-thin-left">

<div class="category-list">
				<div class="tab-box ">

					<ul class="nav nav-tabs add-tabs" role="tablist">
						<li class="active">
							<a href="#allAds" role="tab" data-toggle="tab"> Products
								<span class="badge">{{$products->total()}}</span>
							</a>
						</li>
					</ul>
<div class="tab-filter">
<select class="selectpicker" data-style="btn-select" data-width="auto">
<option>Short by</option>
<option>Price: Low to High</option>
<option>Price: High to Low</option>
</select>
</div>
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

<div class="mobile-filter-bar col-lg-12  ">
<ul class="list-unstyled list-inline no-margin no-padding">
<li class="filter-toggle">
<a class="">
<i class="  icon-th-list"></i>
Filters
</a>
</li>
<li>
<div class="dropdown">
<a data-toggle="dropdown" class="dropdown-toggle"><i class="caret "></i> Short
by </a>
<ul class="dropdown-menu">
<li><a href="" rel="nofollow">Relevance</a></li>
<li><a href="" rel="nofollow">Date</a></li>
<li><a href="" rel="nofollow">Company</a></li>
</ul>
</div>
</li>
</ul>
</div>
<div class="menu-overly-mask"></div>


						<div class="adds-wrapper">

						@foreach($products as $product)

							<div class="item-list">

								@if($product->premiun_status == 1)

									<div class="cornerRibbons urgentAds">
										<a href="#"> Urgent</a>
									</div>

								@elseif($product->premiun_status == 2)

									<div class="cornerRibbons topdAds">
										<a href="#"> Top Ads</a>
									</div>

								@elseif($product->premiun_status == 3)

									<div class="cornerRibbons featuredAds">
										<a href="#"> Featured Ads</a>
									</div>

								@endif
								<div class="col-sm-2 no-padding photobox">
									<div class="add-image">
										<span class="photo-count"><i class="fa fa-camera"></i> {{count($product->image)}} </span>
										<a href="ads-details.html">
											<img class="thumbnail no-margin" 
												src="@if( count($product->image) > 0 )
													{{product_images_path().$product->image[0]->image}}
													@endif" alt="img">
										</a>
									</div>
								</div>
								<div class="col-sm-7 add-desc-box">
									<div class="add-details">
										<h5 class="add-title">
											<a href="ads-details.html"> 
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
										<h2 class="item-price"> GH {{ $product->single_price }} </h2>
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

					<div class="tab-box  save-search-bar text-center">
						{{-- <a href=""> 
							<i class=" icon-plus"></i> Follow User 
						</a> --}}
					</div>
					</div>




<div class="pagination-bar text-center">
{!! $products->links() !!}
</div>
 
@include('site.pages.ask_block')
 
</div>
 
</div>
</div>
</div>
@stop