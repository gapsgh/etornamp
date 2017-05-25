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
	<h5 class="list-title"><strong><a href="#"><i class="icon-money"></i> Price</a></strong></h5>
	
	<ul class="browse-list list-unstyled long-list">
	<li><a @if($sprice_for_view == 'l2h') 
				style="color: green; font-weight: bold;" 
			@endif
			href="{{request()->fullUrlWithQuery(["sprice"=>"l2h"])}}"> 
			<i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Lowest to Highest
		</a>
	</li>
	<li><a @if($sprice_for_view == 'h2l') 
				style="color: green; font-weight: bold;" 
			@endif
			href="{{request()->fullUrlWithQuery(["sprice"=>"h2l"])}}"> 
			<i class="fa fa-sort-amount-desc" aria-hidden="true"></i> Highest to Lowest
		</a>
	</li>
	
	</ul>
</div>

<div class="locations-list  list-filter">
	<h5 class="list-title"><strong><a href="#"><i class=" icon-location-2"></i> Locations</a></strong></h5>
	
	<ul class="browse-list list-unstyled long-list">
	<li><a @if($location_id_for_view == '') 
				style="color: green; font-weight: bold;" 
			@endif
			href="{{url( Request::path() )}}"> 
			<strong>All Locations ({{$all_location_products_count}})</strong>
		</a>
	</li>
	@foreach($locations as $location)
	<li ><a @if($location_id_for_view == $location->id) 
				style="color: green; font-weight: bold;" 
			@endif
			href="{{url(Request::path(). '?lid='.$location->id.
										'&lname='.make_slug($location->name) )}}"> 
			{{$location->name}} ({{$location->product->count()}})
		</a>
	</li>
	@endforeach
	</ul>
</div>



<div class="locations-list  list-filter">
	<h5 class="list-title"><strong><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Sellers </a></strong></h5>
	<ul class="browse-list list-unstyled long-list">
		@foreach($sellers as $seller)
			<li><a @if($seller_id_for_view == $seller->id) 
						style="color: green; font-weight: bold;" 
					@endif
					href="{{url(Request::path(). '?sid='.$seller->id.
										'&sname='.make_slug($seller->name) )}}"> {{$seller->name}} 
					<span class="count">{{$seller->product->count()}}</span>
				</a>
			</li>
		@endforeach
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
{{-- <div class="tab-filter">
<select class="selectpicker" data-style="btn-select" data-width="auto">
<option>Short by</option>
<option>Price: Low to High</option>
<option>Price: High to Low</option>
</select>
</div> --}}
					</div>

					<div class="listing-filter">
						<div class="pull-left col-xs-6">
							<div class="breadcrumb-list"><a href="#" class="current">
								
							</div>
							</div>
							<div class="pull-right col-xs-6 text-right listing-view-action">
								<a href="{{request()->fullUrlWithQuery(["veiw"=>"list"])}}">
									<span @if($veiw_style == 'list')
												class="active"
											@endif><i class="  icon-th"></i></span> 
								</a>
								<a href="{{request()->fullUrlWithQuery(["veiw"=>"grid"])}}">
									<span @if($veiw_style == 'grid')
												class="active"
											@endif><i class=" icon-th-large "></i></span>
								</a>
								<a href="{{request()->fullUrlWithQuery(["veiw"=>"compact"])}}">
									<span @if($veiw_style == 'compact')
												class="active"
											@endif><i class=" icon-th-list  "></i></span> 
									</a>
								<a href="{{request()->fullUrlWithQuery(["veiw"=>"gallery"])}}">
									<span @if($veiw_style == 'gallery')
												class="active"
											@endif><i class="fa fa-picture-o fa-2x" aria-hidden="true"></i></span>
								</a>
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


@if($veiw_style == 'list')
@include('site.pages.filter.list_view')
@endif

@if($veiw_style == 'gallery')
@include('site.pages.filter.gallery_view')
@endif

@if($veiw_style == 'compact')
@include('site.pages.filter.list_view')
@endif

@if($veiw_style == 'grid')
@include('site.pages.filter.list_view')
@endif

					<div class="tab-box  save-search-bar text-center">
						{{-- <a href=""> 
							<i class=" icon-plus"></i> Follow User 
						</a> --}}
					</div>
					</div>




<div class="pagination-bar text-center">
{!! $products->appends($params)->links() !!}
</div>
 
@include('site.pages.ask_block')
 
</div>
 
</div>
</div>
</div>
@stop
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
            $('#lightgallery').lightGallery();
        });

</script>
@stop