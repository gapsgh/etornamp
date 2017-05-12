@extends('site.layout')

@section('title')
	Welcome to Promotegh.com
@stop
@section('content')

<div class="main-container">
	<div class="container">
		<div class="col-lg-12 content-box ">
			<div class="row row-featured row-featured-category">
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
					<div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 f-category">
						<a href="/products/{{$category_sub['id']}}/{{ strtolower(str_replace(' ','-',$category_sub['name']) ) }}"><img src="/uploads/category_images_thumb/{{$category_sub['image']}}" class="img-responsive" alt="img">
							<h6> {{$category_sub['name']}} </h6></a>
					</div>
				@endforeach
			</div>
		</div>
		<div style="clear: both"></div>
@stop