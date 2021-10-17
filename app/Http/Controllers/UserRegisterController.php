<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;

class UserRegisterController extends Controller
{
    public function create(Request $request) {
		
		$email=request('email');
		$password=request('password');
		 $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        
        
        if ($validator->fails()) {
            $response = ['error' => $validator->errors(), 'status' =>false];
        } 
        else {
            $user = DB::table('login')->where('email',$request->email)->first();

            if(!empty($user)) {                
                
                    $response = ['msg' => 'Already email id avilable!', 'status' => true];
                } else {
                   DB::table('login')->insert(['email'=>$email,'password'=>$password]);
				   $response = ['msg' => ' Successfully register !', 'status' => true];
                }                
            
           
        }

        return response()->json($response);
	}    
      public function login(Request $request) {
		
		$email=request('email');
		$password=request('password');
		 $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        
        
        if ($validator->fails()) {
            $response = ['error' => $validator->errors(), 'status' =>false];
        } 
        else {
            $user = DB::table('login')->where('email',$request->email)->where('password',$request->password)->first();

            if(!empty($user)) {                
                $movie = DB::table('movie_list')->where('status',0)->get();
				Session::put('user', $user);
                    return view('dashboard',['movielist'=>$movie]);
                } else {
                   
				   $response = ['msg' => ' Invalid login !', 'status' => true];
                }                
            
           
        }

        return response()->json($response);
	} 
   public function moviedetails(Request $request){
	   $id=$request->id;
	  $movie_desc=DB::table('movie_list')->where('movie_id',$id)->first();
	  $theatre=DB::table('shows_master as s')
	  ->join('theatre_master as ts','s.theatre_id','=','ts.id')
	  ->join('show_time_mapping as stm','stm.st_id','=','s.st_id')
	  ->where('movie_id',$id)->get();
	  $shows_master=DB::table('shows_master as s')
	  ->join('theatre_master as ts','s.theatre_id','=','ts.id')->where('movie_id',$id )->select('theatre_id','ts.*')->distinct()->get();
	  //dd($theatre);
	  return view('movie_details',['movie'=>$movie_desc,'theatre'=>$theatre,'shows_master'=>$shows_master]);
	  
   }
   
   public function logout(){
	   
	  Session::forget('user');
	  
	  return  redirect()->route('login');
   }
   
   
   public function slotdeatils(Request $request){
	   $show=$request->show;
	    $movie=$request->movie;
		 $theatre=$request->theatre;
	  $movie_desc=DB::table('movie_list')->where('movie_id',$movie)->first();
	  $theatre=DB::table('shows_master as s')
	  ->leftjoin('theatre_master as ts','s.theatre_id','=','ts.id')
	  ->leftjoin('show_time_mapping as stm','stm.st_id','=','s.st_id')
	  ->leftjoin('screens_master as sm','sm.t_id','=','ts.id')
	 
	  
	  ->where('s_id',$show)
	  ->where('movie_id',$movie)
	  ->where('id',$theatre)
	  ->distinct()
	  ->get();
	 $avl=DB::table('bookings_master')->where('show_id',$show)->sum('no_seats');
	
	  return view('slotdetails',['movie'=>$movie_desc,'theatre'=>$theatre,'avl'=>$avl]);
	  
   }
   
   public function bookingsubmit(Request $request){
	   $screen=$request->screen;
	   $seats=$request->seats;
	   $amount=$request->amount;
	   $dateee=$request->dateee;
	   $theatre_id=$request->theatre_id;
	   $show=$request->show_id;
	   $ticket_id=rand(1000,9999);
	   $user_id=session::get('user');
	 
	   DB::table('bookings_master')->insert([
	   'ticket_id'=>$ticket_id,
	   't_id'=>$theatre_id,
	   'user_id'=>$user_id->id,
	   'show_id'=>$show,
	   'screen_id'=>$screen,
	   'no_seats'=>$seats,
	   'amount'=>$amount,
	   'date'=>$dateee
	   
	   ]);
	   return redirect()->route('thanku', ['ticket_id'=>$ticket_id]);
	   
	   
   }
   
   public function thanku(Request $request) {
	  $a= $request->ticket_id;
	  return view('thanku',['ticket_id'=>$a]); 
   }
    
	
}
