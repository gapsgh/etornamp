<tr>
		<td style="width:16%" class="add-img-td">
			<a href="#">
				<img class="thumbnail  img-responsive" 
				src="<?php
					if (isset($product['image'][0]['image'])) {
						echo product_images_path().$product['image'][0]['image'];
					}else{
						echo"";
					}
					?>
					" alt="img">
			</a>
		</td>
		<td style="width:50%" class="ads-details-td">
			<div>
				<p>
					<strong> 
						<a href="ads-details.html" title="Brend New Nexus 4">
							{{$product['name']}}
						</a> 
					</strong>
				</p>
				<p>
					<strong>
						Posted 
					</strong>:
					{{Carbon\Carbon::parse($product['created_at'])->diffForHumans()}} 
				</p>
				<p>
					<strong>
						Visitors 
					</strong>
					: {{count($product['visitors'])}} 
				
			</p>
		</div>
	</td>
	<td style="width:25%" class="price-td">
		<div> 
		<small>Single Price:</small><br/>
			<strong>
				GH¢ {{$product['single_price']}} <small> - {{$product['bonus_percentage_single']}}%off</small>
			</strong>
		</div>
		@if($product['bulk_price'] > 0)
			<div><small>Bulk Price:</small><br/>
				<strong>
					GH¢ {{$product['bulk_price']}} <small> - {{$product['bonus_percentage_bulk']}}%off</small>
				</strong>
			</div>
		@endif

	</td>
	<td style="width:10%" class="action-td">
		<div>
			<p>
				<a href="/products/{{$product['id']}}/edit" class="btn btn-primary btn-xs"> 
					<i class="fa fa-edit"></i> Edit 
				</a>
			</p>
			
			<p>
				<form action="/products/{{$product['id']}}" method="POST" class="form-horizontal" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to delete -{{$product['name']}}- ?');">
				<input name="_method" type="hidden" value="DELETE">
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger btn-xs" ><i class=" fa fa-trash"></i> Delete</button>
				</form>
			</p>
		</div>
	</td>
</tr>