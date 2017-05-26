@extends('site.layout')

@section('title')
	Welcome to Promotegh.com
@stop
@section('content')
<div class="intro" style="background-image: url(images/made-in-ghana1.jpg);">
<div class="dtable hw100">
	<div class="dtable-cell hw100">
		<div class="container text-center">
			<h1 class="intro-title animated fadeInDown"> 
				<i class="icon-location-2"></i>Find Ghana Made Products and Services 
			</h1>
			<p class="sub animateme fittext3 animated fadeIn">
				 Find locally produced products and services around you in Minutes
			</p>
				<form action="{{url('/search')}}" method="GET" class="form-horizontal">
				<div class="row search-row animated fadeInUp">

					<div class="col-lg-4 col-sm-4 search-col relative locationicon">
						<i class="icon-location-2 icon-append"></i>
						<input type="text" style=" background-color: #fff; cursor: pointer;" 
							onfocus="$('#changeLocation').modal('show');" 
							name="location" id="company_location" class="form-control locinput input-rel searchtag-input has-icon" placeholder="City" value="" readonly="">
							<input type="hidden" name="city" id="location_city" value="">
					</div>
					<div class="col-lg-4 col-sm-4 search-col relative">
						<i class="icon-docs icon-append"></i>
						<input type="text" name="find" class="form-control has-icon" placeholder="I'm looking for a ..." value="">
					</div>
					<div class="col-lg-4 col-sm-4 search-col">
						<button class="btn btn-primary btn-search btn-block" type="submit"><i class="icon-search"></i><strong>Find</strong></button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="main-container">
	<div class="container">
		<div class="col-lg-12 content-box ">
			<div class="row row-featured row-featured-category">
				<div class="col-lg-12  box-title no-border">
					<div class="inner"><h2><span>Browse by</span>
						Category <a href="#" class="sell-your-item"> View more <i class="  icon-th-list"></i> </a></h2>
					</div>
				</div>
				@foreach($categories as $category)
					<div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 f-category">
						<a href="{{url(sprintf("categories/%d/%s", $category['id'], make_slug($category['name']) ) ) }}"><img src="{{cateory_images_path().$category['image']}}" class="img-responsive" alt="img">
							<h6> {{$category['name']}} </h6></a>
					</div>
				@endforeach
			</div>
		</div>
<div style="clear: both"></div>
<div class="col-lg-12 content-box ">
	<div class="row row-featured">
			<div class="col-lg-12  box-title ">
				<div class="inner"><h2><span>Sponsored </span>
					Products <a href="{{url('/all-featured-products')}}" class="sell-your-item"> View more <i class="  icon-th-list"></i> </a></h2>
				</div>
			</div>
			<div style="clear: both"></div>
			<div class=" relative  content featured-list-row clearfix">
				<nav class="slider-nav has-white-bg nav-narrow-svg">
					<a class="prev">
						<span class="nav-icon-wrap"></span>
					</a>
					<a class="next">
						<span class="nav-icon-wrap"></span>
					</a>
				</nav>
				<div class="no-margin featured-list-slider ">
				@foreach($featured_products as $f_product)
					<div class="item">
						<a href="{{url(sprintf('product/%d/%s',$f_product['id'],make_slug($f_product['name'])))}}">
							<span class="item-carousel-thumb">

								<img class="img-responsive" 
									src="<?php
										if (isset($f_product['image'][0]['image'])) {
											echo url(product_images_path().$f_product['image'][0]['image']);
										}else{
											echo"";
										}
										?>" alt="img">
							</span>
							<span class="item-name"> {{ $f_product['name'] }} </span>
							<span class="price"> GH{{ $f_product['single_price'] }}</span>
						</a>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
<div class="col-lg-12 content-box ">
	<div class="row row-featured">
		<div style="clear: both"></div>
		<div class=" relative  content  clearfix">
			<div class="">
				<div class="tab-lite">

					<ul class="nav nav-tabs " role="tablist">
						<li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"><i class="icon-location-2"></i> Top Locations</a></li>
						
						<li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"><i class="icon-th-list"></i> Top Makes</a>
						</li>
					</ul>

					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="tab1">
							<div class="col-lg-12 tab-inner">
								<div class="row">
								<?php $loc_count = 0;?>
									@foreach($locations_l2s as $location)
										@if($loc_count == 0)
											<ul class="cat-list col-sm-3  col-xs-6 col-xxs-12">
										@endif
											<li><a href="{{url(sprintf('/search?city=%d&location=%s',$location->id,$location->name))}}">{{$location->name}} ({{$location->product->count()}})</a></li>
										<?php $loc_count++; ?>
										@if($loc_count == 12)
											</ul>
											<?php
												$loc_count = 0;
											?>
										@endif
									@endforeach
								</div>
							</div>
						</div>
					
						<div role="tabpanel" class="tab-pane" id="tab3">
							<div class="col-lg-12 tab-inner">
								<div class="row">
									<ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
										<li>
											<a href="#">
												<img class="img-responsive top-makes" src="images/makes/make1.png" alt="tv"> 
											</a>
										</li>
										<li>
											<a href="#">
												<img class="img-responsive top-makes" src="images/makes/make5.jpg" alt="tv"> 
											</a>
										</li>
										
										
									</ul>
									<ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
										<li>
											<a href="#">
												<img class="img-responsive top-makes" src="images/makes/make2.png" alt="tv"> 
											</a>
										</li>
										
									</ul>
									<ul class="cat-list col-sm-3  col-xs-6 col-xxs-12">
										<li>
											<a href="#">
												<img class="img-responsive top-makes" src="images/makes/make3.jpg" alt="tv"> 
											</a>
										</li>
										
									</ul>
									<ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
										<li>
											<a href="#">
												<img class="img-responsive top-makes" src="images/makes/make4.jpg" alt="tv"> 
											</a>
										</li>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<div class="row">
	<div class="col-sm-9 page-content col-thin-right">
	<div class="inner-box category-content">
		<h2 class="title-2">Find Ghana Made Products Nationwide </h2>
		<div class="row">
			<div class="col-md-4 col-sm-4 ">
				<div class="cat-list">
					<h3 class="cat-title"><a href="#">
						<i class="icon-home ln-shadow"></i>
						Property 
						<span class="count">228,705</span></a> 
						<span data-target=".cat-id-2" data-toggle="collapse" class="btn-cat-collapsed collapsed"> 
							<span class=" icon-down-open-big"></span> 
						</span>
						</h3>
						<ul class="cat-collapse collapse in cat-id-2">
							<li><a href="#">House for Rent</a></li>
							<li><a href="#">House for Sale </a></li>
							<li><a href="#"> Apartments For Sale </a></li>
							<li><a href="#">Apartments for Rent </a></li>
							<li><a href="#">Farms-Ranches </a></li>
							<li><a href="#">Land </a></li>
							<li><a href="#">Vacation Rentals </a></li>
							<li><a href="#">Commercial Building</a></li>
						</ul>
					</div>
					<div class="cat-list">
						<h3 class="cat-title"><a href="#"><i class="icon-home ln-shadow"></i>
							Jobs <span class="count">6375</span></a>
							<span data-target=".cat-id-3" data-toggle="collapse" class="btn-cat-collapsed collapsed"> <span class=" icon-down-open-big"></span> </span>
						</h3>
						<ul class="cat-collapse collapse in cat-id-3">
							<li><a href="#">Full Time Jobs</a></li>
							<li><a href="#">Internet Jobs </a></li>
							<li><a href="#">Learn &amp; Earn jobs </a></li>
							<li><a href="#"> Manual Labor Jobs </a></li>
							<li><a href="#">Other Jobs </a></li>
							<li><a href="#">OwnBusiness </a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="cat-list">
						<h3 class="cat-title"><a href="#"><i class="icon-book-open ln-shadow"></i> Learning <span class="count">26,529</span></a> <span data-target=".cat-id-5" data-toggle="collapse" class="btn-cat-collapsed collapsed"> <span class=" icon-down-open-big"></span> </span>
						</h3>
						<ul class="cat-collapse collapse in cat-id-5">
							<li><a href="#"> Automotive Classes </a></li>
							<li><a href="#"> Computer Multimedia Classes </a></li>
							<li><a href="#"> Sports Classes </a></li>
							<li><a href="#"> Home Improvement Classes </a></li>
							<li><a href="#"> Language Classes </a></li>
							<li><a href="#"> Music Classes </a></li>
							<li><a href="#"> Personal Fitness </a></li>
							<li><a href="#"> Other Classes </a></li>
						</ul>
					</div>
					<div class="cat-list">
						<h3 class="cat-title"><a href="#"><i class="icon-guidedog ln-shadow"></i> Pets <span class="count">42,111</span></a>
							<span data-target=".cat-id-6" data-toggle="collapse" class="btn-cat-collapsed collapsed"> <span class=" icon-down-open-big"></span> </span>
						</h3>
						<ul class="cat-collapse collapse in cat-id-6">
							<li><a href="#">Pets for Sale</a></li>
							<li><a href="#">Petsitters &amp; Dogwalkers</a></li>
							<li><a href="#">Equipment &amp; Accessories</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-4   last-column">
					<div class="cat-list">
						<h3 class="cat-title"><a href="#"><i class=" icon-basket-1 ln-shadow"></i> For Sale <span class="count">64,526</span></a> <span data-target=".cat-id-7" data-toggle="collapse" class="btn-cat-collapsed collapsed"> <span class=" icon-down-open-big"></span> </span>
						</h3>
						<ul class="cat-collapse collapse in cat-id-7">
							
							@foreach($categories_forsale as $category)
								<li><a href="#">{{$category->name}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="inner-box has-aff relative">
			<a class="dummy-aff-img" href="#"><img src="images/aff2.jpg" class="img-responsive" alt=" aff"> </a>
		</div>
		<div class="inner-box has-aff relative">
			<a class="dummy-aff-img" href="#"><img src="images/indomin2.jpg" class="img-responsive" alt=" indomie"> </a>
		</div>

	</div>
	<div class="col-sm-3 page-sidebar col-thin-left">
		<aside>
			<div class="inner-box no-padding">
				<div class="inner-box-content">
					<a href="#"><img class="img-responsive" src="images/site/app1.jpg" alt="tv"></a>
				</div>
			</div>
			<div class="inner-box no-padding">
				<img class="img-responsive" src="images/add3.jpg" alt="">
			</div>

			<div class="inner-box">
				<h2 class="title-2">Popular Categories </h2>
				<div class="inner-box-content">
					<ul class="cat-list arrow">
						<li><a href="#"> Apparel (1,386) </a></li>
						<li><a href="#"> Art (1,163) </a></li>
						<li><a href="#"> Business Opportunities (4,974) </a>
						</li>
						<li><a href="#"> Community and Events (1,258) </a></li>
						<li><a href="#"> Electronics and Appliances
							(1,578) </a></li>
							<li><a href="#"> Jobs and Employment (3,609) </a></li>
							<li><a href="#"> Motorcycles (968) </a></li>
							<li><a href="#"> Pets (1,188) </a></li>
							<li><a href="#"> Services (7,583) </a></li>
							<li><a href="#"> Vehicles (1,129) </a></li>
						</ul>
					</div>
				</div>
				<div class="inner-box no-padding">
					<img class="img-responsive" src="images/site/app.jpg" alt="">
				</div>

			</aside>
		</div>
	</div>
	</div>
	@include('site.location_modal')
</div>
@stop
@section('scripts')
<script type="text/javascript">
	var cities = {};
	var locations = JSON.parse(<?php echo $locations_all; ?>);

	$.each(locations, function( index, value ) {
		//populate the cities object for autocomplete
		cities[value.id] = value.name;
	});

</script>
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
<script type="text/javascript" src="{{asset('/assets/plugins/autocomplete/ghana_cities_autocomplete.js')}}"></script>
@stop