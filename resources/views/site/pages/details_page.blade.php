@extends('site.layout')

@section('title')
	Welcome to Promotegh.com
@stop
@section('content')
<div class="main-container">
<div class="container">
<ol class="breadcrumb pull-left">
<li><a href="#"><i class="icon-home fa"></i></a></li>
<li><a href="#">All GMs</a></li>
<li><a href="#">Fashion</a></li>
<li class="active">Bags</li>
</ol>
<div class="pull-right backtolist"><a href="s#"> <i class="fa fa-angle-double-left"></i> Back to Results</a></div>
</div>
<div class="container">
<div class="row">
<div class="col-sm-9 page-content col-thin-right">
<div class="inner inner-box ads-details-wrapper">
<h2> {{$product->name}}
<small class="label label-default adlistingtype">{{$product->company->company_account_type->name}} ad</small>
</h2>
<span class="info-row"> <span class="date"><i class=" icon-clock"> </i> {{Carbon\Carbon::parse($product->created_at)->diffForHumans()}}  </span> - <span class="category">{{$product->category->name}} </span>- <span class="item-location"><i class="fa fa-map-marker"></i> {{$product->producr_location_city->name}} </span> </span>
<div class="ads-image ads-img-v2">
<div class="img-slider-box">
<div class="slider-left">
<ul class="bxslider">
@if( count($product->image) > 0 )
	@foreach($product->image as $image)
		<li><img src="{{url(product_images_large_path().$image->image)}}" alt="img"/></li>
	@endforeach
@endif

{{-- 
<li><img src="/images/Image00015.jpg" alt="img"/></li>
<li><img src="/images/Image00013.jpg" alt="img"/></li> --}}
</ul>
</div>
<div id="bx-pager">
@if( count($product->image) > 0 )
	@foreach($product->image as $key => $image)
		<a class="thumb-item-link" data-slide-index="{{$key}}" href=""><img src="{{url(product_images_thumb_path().$image->image)}}" alt="img"/></a>
	@endforeach
@endif
</div>
</div>
 
</div>
<div class="Ads-Details">
<h5 class="list-title"><strong>Ads Detsils</strong></h5>
<div class="row">
<div class="ads-details-info col-md-8">
<p>{{$product->description}}</p>
</div>
<div class="col-md-4">
<aside class="panel panel-body panel-details">
<ul>
<li>
<p class=" no-margin ">
	<strong>Price:</strong> {{currency_code()}} {{$product->single_price}}
	@if(!empty($product->bonus_percentage_single))
	<strong><span style="color: green"> - {{$product->bonus_percentage_single}} %Off</span></strong>
	@endif
</p>
@if(!empty($product->bulk_price))
	<p class=" no-margin ">
		<strong>Bulk Price:</strong> {{currency_code()}} {{$product->bulk_price}}
		@if(!empty($product->bonus_percentage_bulk))
		<strong><span style="color: green"> - {{$product->bonus_percentage_bulk}} %Off</span></strong>
		@endif
	</p>
@endif
</li>
<li>
<p class="no-margin"><strong>Type:</strong> {{$product->category->name}}</p>
</li>
<li>
<p class="no-margin"><strong>Location:</strong> {{$product->producr_location_city->name}} </p>
</li>
{{-- <li>
<p class=" no-margin "><strong>Condition:</strong> New</p>
</li>
<li>
<p class="no-margin"><strong>Brand:</strong> Sony</p>
</li> --}}
</ul>
</aside>
<div class="ads-action">
<ul class="list-border">
<li><a href="#"> <i class=" fa fa-user"></i> More ads by User </a></li>
<li><a href="#"> <i class="fa fa-share-alt"></i> Share ad </a></li>
<li><a href="#reportAdvertiser" data-toggle="modal"> <i class="fa icon-info-circled-alt"></i> Report abuse </a></li>
</ul>
</div>
</div>
</div>
<div class="content-footer text-left"><a class="btn  btn-primary" data-toggle="modal" href="#contactAdvertiser"><i class=" icon-mail-2"></i> Send a message </a> <a href="tel:{{$product->company->phone_number[0]->number}}" class="btn  btn-info"><i class=" icon-phone-1"></i> {{$product->company->phone_number[0]->number}}  Call Now</a></div>
</div>
</div>
 
</div>
 
<div class="col-sm-3  page-sidebar-right">
<aside>
<div class="panel sidebar-panel panel-contact-seller">
<div class="panel-heading">Contact Seller</div>
<div class="panel-content user-info">
<div class="panel-body text-center">
<div class="seller-info">
<h3 class="no-margin">{{$product->company->name}}</h3>
<p>Location: <strong>{{$product->company->company_location_city->name}}</strong></p>
<p> Joined: <strong> {{nice_date($product->company->created_at)}}</strong></p>
</div>
<div class="user-ads-action">
<a href="#contactAdvertiser" data-toggle="modal" class="btn btn-primary btn-block"><i class=" icon-mail-2"></i> Send a message </a> 
<a href="tel:{{$product->company->phone_number[0]->number}}" class="btn  btn-info btn-block"><i class=" icon-phone-1"></i> {{$product->company->phone_number[0]->number}} Call Now
</a></div>
</div>
</div>
</div>
<div class="panel sidebar-panel">
<div class="panel-heading">Seller Map Location</div>
<div class="panel-content">
<div class="panel-body text-left">
	<a target="blank" href="https://maps.google.com/maps?q={{$product->company->location->lat}}%2C{{$product->company->location->lng}}&z=17&hl=en">

		<img class="hidden-sm hidden-xs" id="map_img" style="width: 100%; height: 200px;" src="{{url('images/loading_map.gif')}}" />
		<img class="hidden-lg hidden-md " id="map_img_md" style="width: 100%; height: 200px;" src="{{url('images/loading_map.gif')}}" />
  	
  	</a>

  	<a class="btn btn-block btn-primary" target="blank" href="https://maps.google.com/maps?q={{$product->company->location->lat}}%2C{{$product->company->location->lng}}&z=17&hl=en"">Get Direction</a>
  	<br/>
  	<h4 class="list-title">Have Uber App?</h4>
  	<a class="btn btn-block" href="geo:{{$product->company->location->lat}},{{$product->company->location->lng}}?z=17"><strong>Request A Drive</strong></a>
</div>
</div>
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
 
</aside>
</div>
 
</div>
</div>
</div>




<div class="modal fade" id="reportAdvertiser" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<h4 class="modal-title"><i class="fa icon-info-circled-alt"></i> There's something wrong with this ads?
</h4>
</div>
<div class="modal-body">
<form role="form">
<div class="form-group">
<label for="report-reason" class="control-label">Reason:</label>
<select name="report-reason" id="report-reason" class="form-control">
<option value="">Select a reason</option>
<option value="soldUnavailable">Item unavailable</option>
<option value="fraud">Fraud</option>
<option value="duplicate">Duplicate</option>
<option value="spam">Spam</option>
<option value="wrongCategory">Wrong category</option>
<option value="other">Other</option>
</select>
</div>
<div class="form-group">
<label for="recipient-email" class="control-label">Your E-mail:</label>
<input type="text" name="email" maxlength="60" class="form-control" id="recipient-email">
</div>
<div class="form-group">
<label for="message-text2" class="control-label">Message <span class="text-count">(300) </span>:</label>
<textarea class="form-control" id="message-text2"></textarea>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<button type="button" class="btn btn-primary">Send Report</button>
</div>
</div>
</div>
</div>
 
 
<div class="modal fade" id="contactAdvertiser" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<h4 class="modal-title"><i class=" icon-mail-2"></i> Contact advertiser </h4>
</div>
<div class="modal-body">
<form role="form">
<div class="form-group">
<label for="recipient-name" class="control-label">Name:</label>
<input class="form-control required" id="recipient-name" placeholder="Your name" data-placement="top" data-trigger="manual" data-content="Must be at least 3 characters long, and must only contain letters." type="text">
</div>
<div class="form-group">
<label for="sender-email" class="control-label">E-mail:</label>
<input id="sender-email" type="text" data-content="Must be a valid e-mail address (user@gmail.com)" data-trigger="manual" data-placement="top" placeholder="email@you.com" class="form-control email">
</div>
<div class="form-group">
<label for="recipient-Phone-Number" class="control-label">Phone Number:</label>
<input type="text" maxlength="60" class="form-control" id="recipient-Phone-Number">
</div>
<div class="form-group">
<label for="message-text" class="control-label">Message <span class="text-count">(300) </span>:</label>
<textarea class="form-control" id="message-text" placeholder="Your message here.." data-placement="top" data-trigger="manual"></textarea>
</div>
<div class="form-group">
<p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not
valid. </p>
</div>
</form>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<button type="submit" class="btn btn-success pull-right">Send message!</button>
</div>
</div>
</div>
</div>
@stop

@section('scripts')
<script>
    $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager'
    });


function swap() {
        document.getElementById('map_img').src = "https://maps.googleapis.com/maps/api/staticmap?center={{$product->company->location->lat}},{{$product->company->location->lng}}&size=200x200&maptype=roadmap&markers=color:green%7Clabel:L%7C{{$product->company->location->lat}},{{$product->company->location->lng}}&key=AIzaSyAX8XJtyjRrRbU1dccKfPBqPKIocplN4o4&zoom=15";
    
    document.getElementById('map_img_md').src = "https://maps.googleapis.com/maps/api/staticmap?center={{$product->company->location->lat}},{{$product->company->location->lng}}&size=400x300&maptype=roadmap&markers=color:green%7Clabel:L%7C{{$product->company->location->lat}},{{$product->company->location->lng}}&key=AIzaSyAX8XJtyjRrRbU1dccKfPBqPKIocplN4o4&zoom=15";
    
    }
    swap();
    

    // "http://maps.google.com/staticmap?center=37.687,-122.407&zoom=8&size=450x300&maptype=terrain&key=AIzaSyDqAYaryKJixJsWu8L4gTcRdqTylIA-hzg&libraries&sensor=false"
</script>
@stop