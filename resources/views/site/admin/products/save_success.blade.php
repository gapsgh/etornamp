@extends('site.layout')

@section('title')
	Promotegh.com - Product Save Successful.
@stop

@section('content')
<div class="main-container">
	<div class="container">
		<div class="row">
			<div class="col-md-12 page-content">
				<div class="inner-box category-content">
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-success pgray  alert-lg" role="alert">
								<h2 class="no-margin no-padding">&#10004; 
									Congratulations! Your ad will be available soon.
								</h2>
								<p>
									Thank you for choosing promotegh.com. your product / service will be online in some few seconds.<br/>
									<b>If you posted the product as any of our featured listing, you will receive a call from promotegh.com for confirmation and approval.</b>
								</p>
							</div>
							<div class="post-promo text-center">
								<h2> Have More Products? </h2>
								<h5>Click on the link below to add more products</h5>
								<a style="margin:10px" href="{{url('/products/create')}}" class="btn btn-lg btn-border btn-post btn-danger">
									<i class="icon-docs"></i> Add Another Product 
								</a>
								<p>OR</p>
								<a style="margin:10px" href="{{url('/account/dashboard')}}" class="btn btn-lg btn-border  btn-primary">
									<i class="icon-home"></i> Return To Dashboard 
								</a>
							
							</div>
							<br/>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>
</div>
@stop

@section('scripts')

@stop