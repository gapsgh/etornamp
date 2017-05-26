function create_map(pos) {
   
	var map = new google.maps.Map(document.getElementById('map-canvas'),{
		center:pos,
		zoom:15
	});
	
	var marker = new google.maps.Marker({
		position:pos,
		map:map,
		draggable:true
	});
	$('#lat').val(pos.lat);
	$('#lng').val(pos.lng);

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

	 }