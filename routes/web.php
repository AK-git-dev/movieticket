<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', ['as'=>'login',function() {
   return view('login');
}]);
Route::get('/', function () {
    return view('signup');
});
Route::post('create', 'UserRegisterController@create');
Route::post('login', 'UserRegisterController@login');
Route::any('thanku', 'UserRegisterController@thanku')->name('thanku');
Route::any('movie/{id}', 'UserRegisterController@moviedetails')->name('movie');
Route::any('slotdeatils/{show}/{movie}/{theatre}', 'UserRegisterController@slotdeatils')->name('slotdeatils');
Route::any('logout', 'UserRegisterController@logout')->name('logout');
Route::post('searchdatafunction', 'UserRegisterController@listpage')->name('listpage');
Route::post('addeditdelete', 'UserRegisterController@addeditdelete')->name('addeditdelete');
Route::get('listpage', 'UserRegisterController@listpage')->name('listpage');
Route::post('bookingsubmit', 'UserRegisterController@bookingsubmit')->name('bookingsubmit');

Route::post('adduser', 'UserRegisterController@adduser')->name('adduser');

Route::post('checkuseremail', 'UserRegisterController@checkuseremail')->name('checkuseremail');
Route::get('register', 'UserRegisterController@create')->name('register');


Route::post('register/generate-otp', 'UserRegisterController@generateotp')->name('register.generate-otp');

Route::post('register/verify-otp', 'UserRegisterController@verifyotp')->name('register.verify-otp');
Route::post('register/store', 'UserRegisterController@store')->name('register.store');

Route::post('register/sign-in', 'UserRegisterController@signin')->name('register.sign-in');

Route::get('apicall', 'UserRegisterController@conversations_list')->name('apicall');

Route::get('account', 'UserRegisterController@accountlist')->name('accountlist');

Route::any('adddata', 'UserRegisterController@adddata')->name('adddata');