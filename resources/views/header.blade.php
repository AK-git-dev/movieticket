<!DOCTYPE HTML>
<html>
<head>
<title>Movie</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="{{asset('public/css/style.css')}}" type="text/css" media="all" />
<link rel="stylesheet" href="{{asset('public/css/flexslider.css')}}" type="text/css" media="all" />
<link type="text/css" rel="stylesheet" href="http://www.dreamtemplate.com/dreamcodes/tabs/css/tsc_tabs.css" />
<link rel="stylesheet" href="{{asset('public/css/tsc_tabs.css')}}" type="text/css" media="all" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('public/js/jquery.color-RGBa-patch.js')}}"></script>
<script src="{{asset('public/js/example.js')}}"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header">
	<div class="header-top">
		<div class="wrap">
			<div class="h-logo">
			<a href="http://localhost/blog/"><img src="{{asset('public/images/logo.png')}}"  width="50" height="50" alt=""/></a>
		</div>
			  <div class="nav-wrap">
					<ul class="group" id="example-one">
			          
						@if(Session::has('user'))
							<li>welcome:user</li>
							<li><a href="{{route('logout')}}">logout</a></li>
						@else
			  		   <li><a href="http://localhost/blog/">Singup</a></li>
			  		  <li><a href="http://localhost/blog/login">Login</a></li>
					  @endif
			        </ul>
			  </div>
 			<div class="clear"></div>
   		</div>
    </div>
     			<div class="clear"></div>
   	

<div class="block">
	<div class="wrap">
		
       
		       <fieldset>
		       	<div class="field" >
		       	
		       		     
                                
    </div>       	

		       </fieldset>
      
            <div class="clear"></div>
   </div>
</div>