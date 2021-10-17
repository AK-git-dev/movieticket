
@include('header')

<div class="content">
	<div class="wrap">
		<div class="content-top">
						
			<form action="create" method="post" style="width:100%" class="form-signin">   
@csrf            
<h1 class="mb-0 font-weight-normal LH-Text">SignUP </h1>
<img class="mb-3 img-fluid logo" src="{{URL::asset('public/images/login-logo.png')}}" alt="">

<label for="inputEmail" class="d-block">Email id</label>
<input type="email" class="form-control mb-1" name="email" id="email" placeholder="Email Id" required autofocus>
<div style="color:#ff0000"> {{ $errors->login->first('email') }}</div>
<label for="inputPassword" class="mb-1 d-block">Password</label>
<input type="password" class="form-control mb-1" name="password" id="password" placeholder="Password" required>
<div style="color:#ff0000">{{ $errors->login->first('password') }}</div>

<input type="submit" class="btn btn-primary btn-block mt-3" value="Sign UP"/>

<!--a href="#" class="btn btn-outline-dark btn-block" type="">Sign Up</a-->
<p class="w-75 mx-auto mt-3"></p>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
@if(Session::has('error'))
    <span style="color:#ff0000">{{ ucfirst(Session::get('error')) }}</span>
@endif 
</form> 	
		
	</div>
</div>
@include('footer')
</div>

		
		