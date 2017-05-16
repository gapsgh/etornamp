<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@include('site.links')
	
	<title>@yield('title', 'Promotegh.com')</title>

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->  

    <script>
    	paceOptions = {
    		elements: true
    	};
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="{{asset('/assets/js/pace.min.js')}}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqAYaryKJixJsWu8L4gTcRdqTylIA-hzg&libraries=places"
  type="text/javascript"></script>
</head>
<body>
	<div id="wrapper">
		@include('site.header')

					<div class="conainner">
						@yield('content')

					</div>

					@include('site.site_footer')



	
	<script src="{{asset('/assets/bootstrap/js/bootstrap.min.js')}}"></script>

	<script src="{{asset('/assets/js/owl.carousel.min.js')}}"></script>

	<script src="{{asset('/assets/js/jquery.matchHeight-min.js')}}"></script>

	<script src="{{asset('/assets/js/hideMaxListItem.js')}}"></script>

	<script src="{{asset('/assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js')}}"></script>
	<script src="{{asset('/assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js')}}"></script>

	<script src="{{asset('/assets/js/script.js')}}"></script>
	<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script src="https://use.fontawesome.com/7a96213a08.js"></script>
	<script>


	</script>

	<script type="text/javascript" src="{{asset('/assets/plugins/autocomplete/jquery.mockjax.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/plugins/autocomplete/jquery.autocomplete.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/plugins/autocomplete/usastates.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/plugins/autocomplete/autocomplete-demo.js')}}"></script>
	<script src="{{asset('/assets/js/fileinput.min.js')}}" type="text/javascript"></script>
	
    <script type="text/javascript" src="{{asset('/assets/js/materialize.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/plugins/lightGallery-master/dist/js/lightgallery.js')}}"></script>


	<script type="text/javascript">
		function initialize_image_input(input_id) {
        $("#"+input_id).fileinput({
            'showUpload':false,
            'maxFileSize':10000,
            'allowedFileTypes':['image'],
            'allowedFileExtensions':['jpg', 'png'],
            'allowedPreviewTypes':['image'],
            'previewFileType':'image'
        });
    }

	</script>
	<script type="text/javascript">

(function(){
//function for finding :contains case insensitive
jQuery.expr[':'].icontains = function(a, i, m) {
return jQuery(a).text().toUpperCase()
  .indexOf(m[3].toUpperCase()) >= 0;
};


var searchTerm, panelContainerId,contained_elements;
  $('#accordion_search_bar').on('change keyup paste click', function () {
    searchTerm = $(this).val();
    	$('#accordion > .panel').each(function () {
	      panelContainerId = '#' + $(this).attr('id');
	      console.log(searchTerm);

	      $(panelContainerId + ':not(:icontains(' + searchTerm + '))').hide();
	      $(panelContainerId + ':icontains(' + searchTerm + ')').show();


	      if(searchTerm != ""){
	      	contained_elements = jQuery(".location_li:icontains('" + searchTerm + "')");
		      console.log(contained_elements.length);

		      if(contained_elements.length > 0){
		      		contained_elements.each(function () {
			      		$(this).html($(this).data('original').replace(new RegExp(searchTerm, "gi"), "<span style='color:red; font-weight:bold;'>$&</span>"));
			      		$(this).closest( "li").show();
			      });
		      }
		      
		      jQuery(".location_li:not(:icontains('" + searchTerm + "') )").each(function () {
		      	$(this).html($(this).data('original'));
		      	$(this).closest( "li").hide();

		      });
	      }else{
	      	jQuery(".location_li:not(:icontains('" + searchTerm + "') )").each(function () {
		      	$(this).html($(this).data('original'));
		      	$(this).closest( "li").show();
		      });
	      	jQuery(".location_li:icontains('" + searchTerm + "')").each(function () {
		      	$(this).html($(this).data('original'));
		      	$(this).closest( "li").show();
		      });
	      }
	      

	    });
	    
});

}());

    // Toast Notification
 /*   $(window).load(function() {
        setTimeout(function() {
            Materialize.toast('<span>Hiya! I am a toast.</span>', 1500);
        }, 3000);
        setTimeout(function() {
            Materialize.toast('<span>You can swipe me too!</span>', 355555000);
        }, 5500);
        setTimeout(function() {
            Materialize.toast('<span>You have new order.</span><a class="btn-flat yellow-text" href="#">Read<a>', 3000);
        }, 18000);
    });*/
    

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

    </script>
	@yield('scripts')

</body>
</html>