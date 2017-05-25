@extends('site.layout')

@section('title')
	Welcome to Promotegh.com
@stop
@section('content')

<div class="main-container">
	<div class="container">
	
		<div class="row">
	<div class="col-sm-9 page-content col-thin-right">
	<div class="inner-box category-content">
		<div class="col-lg-12  box-title no-border">
					<div class="inner"><h2><span>
					@if(isset($category))
						{{$category['name']}}
					@else
						{{'All'}}
					@endif
					 ></span>
						Sub Categories </h2>
					</div>
				</div>
				@foreach($sub_categories as $category_sub)
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 f-category">
						<a href="{{url(sprintf('category/%d/%s',$category_sub['id'],make_slug($category_sub['name']) ) )}}"><img src="{{cateory_images_path().$category_sub['image']}}" class="img-responsive" alt="img">
							<h6> {{$category_sub['name']}} </h6></a>
					</div>
				@endforeach
			</div>
		<div class="inner-box has-aff relative">
			<a class="dummy-aff-img" href="#"><img src="{{url('images/all_products.jpg')}}" class="img-responsive" alt=" indomie"> </a>
		</div>
		
	</div>
	<div class="col-sm-3 page-sidebar col-thin-left">
		<aside>
			<div class="inner-box no-padding">
				<img class="img-responsive" src="{{url('images/migcloth.png')}}" alt="">
			</div>

			<div class="inner-box no-padding">
				<img class="img-responsive" src="{{url('images/add2.jpg')}}" alt="">
			</div>

		</aside>
		</div>
	</div>
@stop