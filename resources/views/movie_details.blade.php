@include('header');

<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">	
						<h3>{{$movie->movie_name}}</h3>	
							<div class="about-top">	
								<div class="grid images_3_of_2">
									<img src="http://localhost/blog/public/{{$movie->image}}" alt=""/>
								</div>
								<div class="desc span_3_of_2">
									<p class="p-link" style="font-size:15px">Cast :{{$movie->cast}}</p>
									<p class="p-link" style="font-size:15px">Relece Date : {{ date('d-M-Y',strtotime($movie->release_date))}}</p>
									<p style="font-size:15px">{{$movie->desc }}</p>
									<a href="{{$movie->video_url}}" target="_blank" class="watch_but">Watch Trailer</a>
								</div>
								<div class="clear"></div>
							</div>
							@if(!empty($shows_master))
							<table class="table table-hover table-bordered text-center">
								@foreach($shows_master as $s)
									<tr>
										<td>
										{{$s->name}} {{$s->place}}
										</td>
										<td>
										
										@foreach($theatre as $t)
													@if($t->theatre_id==$s->theatre_id)
												<a href="{{route('slotdeatils',['show'=>$t->s_id ,'movie'=>$t->movie_id,'theatre'=>$t->theatre_id])}}"><button class="btn btn-default">{{ date('h:i A',strtotime($t->start_time))}}</button></a>
													@endif
											@endforeach	
										</td>
									</tr>
									@endforeach
						</table>
							
						
							@else
							
								<h3>No Show Available</h3>
						@endif
						
					</div>			
				
			</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
@include('footer')