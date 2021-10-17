@include('header')
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
									<p class="p-link" style="font-size:15px">Cast : {{ $movie->cast}}</p>
									<p class="p-link" style="font-size:15px">Relece Date : {{date('d-M-Y',strtotime($movie->release_date))}}</p>
									<p style="font-size:15px">{{$movie->desc}}</p>
									<a href="{{$movie->video_url}}" target="_blank" class="watch_but">Watch Trailer</a>
								</div>
								<div class="clear"></div>
							</div>
							<table class="table table-hover table-bordered text-center">
							@foreach($theatre as $t)
									<tr>
										<td class="col-md-6">
											Theatre
										</td>
										<td>
										{{ $t->name }} {{$t->place}}
										</td>
										</tr>
										<tr>
											<td>
												Screen
											</td>
										<td>
											
												{{$t->screen_name}}
							
										</td>
									</tr>
									<tr>
										<td>
											Date
										</td>
										<td>
											<?php 
											if(isset($_GET['date']))
							{
								$date=$_GET['date'];
							}
							else
							{
								if($t->start_date>date('Y-m-d'))
								{
									$date=date('Y-m-d',strtotime($t->start_date . "-1 days"));
								}
								else
								{
									$date=date('Y-m-d');
								}
								
								$_SESSION['dd']=$date;
							}
							?>
							
							<div class="col-md-12 text-center" style="padding-bottom:20px">
								<?php if($date>$_SESSION['dd']){?> <?php } ?><span style="cursor:default" class="btn btn-default"><?php echo date('d-M-Y',strtotime($date));?></span>
								<?php if($date!=date('Y-m-d',strtotime($_SESSION['dd'] . "+4 days"))){?>
								<button class="btn btn-default"><i class="glyphicon glyphicon-chevron-right"></i></button>
								<?php }
								
								?>
							</div>
							
							</td>
									</tr>
									<tr>
										<td>
											Show Time
										</td>
										<td>
											<?php echo date('h:i A',strtotime($t->start_time))." ".$t->name;?> Show
										</td>
									</tr>
									<tr>
										<td>
											Number of Seats
										</td>
										<td>
											<form  action="{{route('bookingsubmit')}}" method="post">
											@csrf
												<input type="hidden" name="screen" value="<?php echo $t->screen_id;?>"/>
											<input type="number" required tile="Number of Seats" max="<?php echo $t->seats-$avl;?>" min="0" name="seats" class="form-control" value="1" style="text-align:center" id="seats"/>
											<input type="hidden" name="amount" id="hm" value="<?php echo $t->charge;?>"/>
											<input type="hidden" name="amount" id="akkkk" value="<?php echo $t->charge;?>"/>
											<input type="hidden" name="dateee" value="<?php echo $date;?>"/>
											<input type="hidden" name="theatre_id" value="<?php echo $t->theatre_id;?>"/>
											<input type="hidden" name="show" value="<?php echo $t->theatre_id;?>"/>
											<input type="hidden" name="show_id" value="<?php echo $t->st_id;?>"/>
										</td>
									</tr>
									<tr>
										<td>
											Amount
										</td>
										<td id="amount" style="font-weight:bold;font-size:18px">
											Rs <?php echo $t->charge;?>
										</td>
									</tr>
									<tr>
										<td colspan="2"><?php if($avl==$t->seats){?><button type="button" class="btn btn-danger" style="width:100%">House Full</button><?php } else { ?>
										<button class="btn btn-info" style="width:100%">Book Now</button>
										<?php } ?>
										</form></td>
									</tr>
						<table>
							<tr>
								<td></td>
							</tr>
						</table>
							@endforeach
					</div>			
			
			</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
@include('footer')
<script type="text/javascript">
	$('#seats').change(function(){
		var charge=$("#akkkk").val();
		amount=charge*$(this).val();
		$('#amount').html("Rs "+amount);
		$('#hm').val(amount);
	});
</script>