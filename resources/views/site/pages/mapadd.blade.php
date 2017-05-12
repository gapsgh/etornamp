@extends('site.layout')

@section('title')
	map
@stop
@section('content')
	<form action="/map/add" method="POST"  enctype="multipart/form-data">
		{{ csrf_field() }}
		<fieldset>
			<div class="form-group">
				<label class="col-md-3 control-label" for="Adtitle">Ad title</label>
				<div class="col-md-8">
					<input id="Adtitle" name="title"  class="form-control input-md" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="">Map</label>
				<div class="col-md-8">
					<input id="searchmap" class="form-control input-md" type="text">
					<div id="map-canvas" style="width: 350px; height: 250px;"></div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="Adtitle">Lat</label>
				<div class="col-md-8">
					<input id="lat" class="form-control input-md" name="lat" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label" for="Adtitle">Lng</label>
				<div class="col-md-8">
					<input id="lng" class="form-control input-md" name="lng" type="text">
				</div>
			</div>

			<button class="btn btn-success btn-lg">Save</button>




		</fieldset>
		
	</form>
@stop

@section('scripts')
<script type="text/javascript">
	var map = new google.maps.Map(document.getElementById('map-canvas'),{
		center:{
			lat:27.72,
			lng:85.36
		},
		zoom:15
	});
	var marker = new google.maps.Marker({
		position:{
			lat:27.72,
			lng:85.36
		},
		map:map,
		draggable:true
	});
	var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

	google.maps.event.addListener(searchBox,'places_changed',function(){
		var places = searchBox.getPlaces();
		var bounds = new google.maps.LatLngBounds();
		var i, place;
		for ( i=0; place=places[i]; i++) {
			bounds.extend(place.geometry.location);
			marker.setPosition(place.geometry.location); //set marker position to new location
		}
		map.fitBounds(bounds);
		map.setZoom(15);
	});

	google.maps.event.addListener(marker,'position_changed',function(){
		var lat = marker.getPosition().lat();
		var lng = marker.getPosition().lng(); 
		$('#lat').val(lat);
		$('#lng').val(lng);

	});

</script>
@stop