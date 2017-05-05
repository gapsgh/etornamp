@extends('site.layout')

@section('title')
	Promotegh.com - Product Save Successful.
@stop

@section('content')
<div class="main-container">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 page-sidebar">
				@include('site.admin.sidebar')
			</div>
								
				<div class="col-sm-9 page-content">
					<div class="inner-box">
						<h2 class="title-2"><i class="icon-docs"></i> My Ads </h2>
						<div class="table-responsive">
							<div class="table-action">
								<div class="table-search pull-right col-xs-7">
									<div class="form-group">

									</div>
								</div>
							</div>
							<table id="addManageTable" class="table table-striped table-bordered add-manage-table table demo" data-filter="#filter" data-filter-text-only="true">
								<thead>
									<tr>
										<th> Photo</th>
										<th data-sort-ignore="true"> Adds Details</th>
										<th data-type="numeric"> Price</th>
										<th> Option</th>
									</tr>
								</thead>
								<tbody>
								@foreach($products as $product)
									@include('site.admin.products.product_row')
								@endforeach
							</tbody>
						</table>
					</div>

				</div>
			</div>

		</div>

	</div>

</div>
@stop

@section('scripts')
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
	<script type="text/javascript">
		$(document).ready(function(){
		    $('#addManageTable').DataTable();
		});
	</script>
@stop