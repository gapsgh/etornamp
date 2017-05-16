@extends('site.layout')

@section('title')
	map
@stop
@section('content')
<div class="main-container">
	<div class="container">
	<div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="/images/hbg2.jpg, /images/hbg2.jpg 480, /images/hbg2.jpg" data-src="/images/hbg2.jpg" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                    <a href="">
                        <img class="img-responsive" src="/images/hbg2.jpg">
                    </a>
                </li>
            </ul>
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