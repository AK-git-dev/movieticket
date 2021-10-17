
@include('header')

<div class="content">
	<div class="wrap">
		<div class="content-top">
			<h3>Movies</h3>
			
			<?php
          	 $today=date("Y-m-d");
			 ?>
          	 @if(!empty($movielist))
		
          	  @foreach($movielist as $list)
                   
                    
                    
                    <div class="col_1_of_4 span_1_of_4">
					<div class="imageRow">
						  	<div class="single">
						  		<?php
						
						?>
						<a href="{{route('movie',['id'=>$list->movie_id])}}"><img src="http://localhost/blog/public/{{$list->image}}"  /></a>
						  		
						  	</div>
						  	<div class="movie-text">
						  		<h4 class="h-text"><a href="{{route('movie',['id'=>$list->movie_id])}}">{{$list->movie_name}}</a></h4>
						  		Cast:<Span class="color2">{{$list->cast}}</span><br>
						  		
						  	</div>
		  				</div>
		  		</div>
				@endforeach
				@else
					no data 
				@endif
		  		
  	    
			
			</div>
				<div class="clear"></div>		
			</div>
@include('footer')



		
		