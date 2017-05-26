	<div class="modal fade" id="changeLocation" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title"><i class=" icon-location-2"></i> Select A Location </h4>
					</div>
					<div class="modal-body">


						<div class="location_container"  id="page_container">

							<div id="accordion_search_bar_container" class="form-group">
								<input class="form-control input-md" type="search" id="accordion_search_bar"  placeholder="Search Your Location"/>
							</div>

							<div class="panel-group"  id="accordion"  role="tablist" aria-multiselectable="true">

								@foreach($locations as $key => $main_location)


								<div class="panel panel-success" id="collapse{{$key}}_container">
									<div class="panel-heading" role="tab" id="heading{{$key}}">
										<h4 class="panel-title">
											<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}" style="display: block;">
												{{$main_location['name']}}
											</a>
										</h4>
									</div>
									<div id="collapse{{$key}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{$key}}">
										<div class="panel-body">
											@foreach($main_location['sub_locations'] as $key => $sub_location)
											<ul>
												<li class="location-li" style="padding: 6px 0px 6px 0px; border-bottom: 1px solid rgba(128, 128, 128, 0.18);" 
													onclick="$('#location_city').val('{{$sub_location['id']}}'); 
															 $('#company_location').val('{{$sub_location['name']}}'); 
															 $('#changeLocation').modal('hide');">
													<span class="location_li" data-original="{{$sub_location['name']}}">
														{{$sub_location['name']}} 
													</span>
													<button onclick="$('#location_city').val('{{$sub_location['id']}}'); $('#company_location').val('{{$sub_location['name']}}')" type="button" class="btn btn-primary btn-xs pull-right" data-dismiss="modal">
														<i class=" icon-location-2"></i>select
													</button> 
												</li>
											</ul>
											@endforeach
										</div>
									</div>
								</div>

								@endforeach

							</div>
						</div>


					</div>
					<div class="modal-footer">

					</div>
				</div>
			</div>
		</div>

