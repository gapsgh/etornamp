<div class="adds-wrapper">
<br/>
	<div class="demo-gallery">
	    <div id="lightgallery">
	    @foreach($products as $product)
	        <div class="col-xs-6 col-sm-4 col-md-3"
	        	data-responsive="@if( count($product->image) > 0 )
									{{product_images_large_path().$product->image[0]->image}}
									@endif, 
									@if( count($product->image) > 0 )
									{{product_images_large_path().$product->image[0]->image}}
									@endif, 
									@if( count($product->image) > 0 )
									{{product_images_large_path().$product->image[0]->image}}
									@endif" 
	        	data-src="@if( count($product->image) > 0 )
							{{product_images_large_path().$product->image[0]->image}}
							@endif" 
	        	data-sub-html="<h4>{{ $product->name }}</h4><a href='#'>View Details</p>">
	            <a href="">
	                <img class="img-responsive" style="    display: block;
    padding: 4px;
    line-height: 1.42857143;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;" src="@if( count($product->image) > 0 )
													{{product_images_path().$product->image[0]->image}}
													@endif">
	            </a>
	        </div>
	        @endforeach
	    </div>

	</div>

</div>