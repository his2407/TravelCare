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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['web']], function(){
	Route::post('session','App\Http\Controllers\Maincontroller@session')->name('session');
	Route::get('logout','App\Http\Controllers\Maincontroller@logout');
});

//USER

Route::get('index','App\Http\Controllers\Maincontroller@index');
Route::get('contact','App\Http\Controllers\Maincontroller@contact');
Route::get('aboutus','App\Http\Controllers\Maincontroller@aboutus');

Route::get('login','App\Http\Controllers\Maincontroller@login');
Route::get('signup','App\Http\Controllers\Maincontroller@signup');
Route::post('submitsignup','App\Http\Controllers\Maincontroller@submitsignup');

Route::get('editprofile','App\Http\Controllers\Maincontroller@editprofile');
Route::post('submitprofile','App\Http\Controllers\Maincontroller@submitprofile')->name('submitprofile');
Route::get('editpassword','App\Http\Controllers\Maincontroller@editpassword');
Route::post('submitchangepass','App\Http\Controllers\Maincontroller@submitchangepass')->name('submitchangepass');
Route::get('history','App\Http\Controllers\Maincontroller@history');

Route::get('hotel','App\Http\Controllers\KScontroller@hotel');
Route::get('hoteldetail/{x}','App\Http\Controllers\KScontroller@hoteldetail');
Route::post('postcomment','App\Http\Controllers\KScontroller@postcomment')->name('postcomment');
Route::get('delcomment/{x}','App\Http\Controllers\KScontroller@delcomment');
Route::get('purhotel/{x}','App\Http\Controllers\KScontroller@purhotel');
Route::post('submithotel','App\Http\Controllers\KScontroller@submithotel')->name('submithotel');
Route::post('dealhotel','App\Http\Controllers\KScontroller@dealhotel')->name('dealhotel');
Route::get('deldealhotel/{x}','App\Http\Controllers\KScontroller@deldealhotel');
Route::get('editdealhotel/{x}','App\Http\Controllers\KScontroller@editdealhotel');
Route::post('submiteditdealhotel','App\Http\Controllers\KScontroller@submiteditdealhotel')->name('submiteditdealhotel');

Route::get('flights','App\Http\Controllers\MBcontroller@flights');
Route::get('flightdetail/{x}','App\Http\Controllers\MBcontroller@flightdetail');
Route::get('purflight/{x}','App\Http\Controllers\MBcontroller@purflight');
Route::post('submitflight','App\Http\Controllers\MBcontroller@submitflight')->name('submitflight');
Route::post('dealflight','App\Http\Controllers\MBcontroller@dealflight')->name('dealflight');
Route::get('deldealflight/{x}','App\Http\Controllers\MBcontroller@deldealflight');
Route::get('editdealflight/{x}','App\Http\Controllers\MBcontroller@editdealflight');
Route::post('submiteditdealflight','App\Http\Controllers\MBcontroller@submiteditdealflight')->name('submiteditdealflight');

//ADMIN

Route::get('admin','App\Http\Controllers\Admincontroller@main');
Route::get('ad-account/{x}','App\Http\Controllers\Admincontroller@account');
Route::post('ad-editaccount','App\Http\Controllers\Admincontroller@editaccount')->name('ad-editaccount');
Route::get('ad-delaccount/{x}','App\Http\Controllers\Admincontroller@delaccount');
Route::get('ad-user','App\Http\Controllers\Admincontroller@user');

Route::get('ad-hotel','App\Http\Controllers\Admincontroller@hotel');
Route::get('ad-addhotel','App\Http\Controllers\Admincontroller@addhotel');
Route::post('ad-submitaddhotel','App\Http\Controllers\Admincontroller@submitaddhotel')->name('ad-submitaddhotel');
Route::get('ad-edithotel/{x}','App\Http\Controllers\Admincontroller@edithotel');
Route::post('ad-submitedithotel','App\Http\Controllers\Admincontroller@submitedithotel')->name('ad-submitedithotel');
Route::get('ad-delhotel/{x}','App\Http\Controllers\Admincontroller@delhotel');
Route::get('ad-hotelphotos/{x}','App\Http\Controllers\Admincontroller@hotelphotos');
Route::post('ad-hotelupphoto','App\Http\Controllers\Admincontroller@hotelupphoto')->name('ad-hotelupphoto');
Route::get('ad-delphoto/{x}','App\Http\Controllers\Admincontroller@delphoto');
Route::get('ad-hotelrooms/{x}','App\Http\Controllers\Admincontroller@hotelrooms');
Route::post('ad-editroom','App\Http\Controllers\Admincontroller@editroom')->name('ad-editroom');
Route::get('ad-hotelservice/{x}','App\Http\Controllers\Admincontroller@hotelservice');
Route::post('ad-submiteditservice','App\Http\Controllers\Admincontroller@submiteditservice')->name('ad-submiteditservice');

Route::get('ad-flight','App\Http\Controllers\Admincontroller@flight');
Route::get('ad-addflight','App\Http\Controllers\Admincontroller@addflight');
Route::post('ad-submitaddflight','App\Http\Controllers\Admincontroller@submitaddflight')->name('ad-submitaddflight');
Route::get('ad-editflight/{x}','App\Http\Controllers\Admincontroller@editflight');
Route::post('ad-submiteditflight','App\Http\Controllers\Admincontroller@submiteditflight')->name('ad-submiteditflight');
Route::get('ad-delflight/{x}','App\Http\Controllers\Admincontroller@delflight');
Route::get('ad-flightprice/{x}','App\Http\Controllers\Admincontroller@flightprice');
Route::post('ad-editflightprice','App\Http\Controllers\Admincontroller@editflightprice')->name('ad-editflightprice');
Route::get('ad-addcompany','App\Http\Controllers\Admincontroller@addcompany');
Route::post('ad-submitaddcompany','App\Http\Controllers\Admincontroller@submitaddcompany')->name('ad-submitaddcompany');
Route::get('ad-editcompany/{x}','App\Http\Controllers\Admincontroller@editcompany');
Route::post('ad-submiteditcompany','App\Http\Controllers\Admincontroller@submiteditcompany')->name('ad-submiteditcompany');
Route::get('ad-delcompany/{x}','App\Http\Controllers\Admincontroller@delcompany');

Route::get('ad-hotelorder','App\Http\Controllers\Admincontroller@hotelorder');
Route::get('ad-addhotelorder','App\Http\Controllers\Admincontroller@addhotelorder');
Route::post('ad-submitaddhotelorder','App\Http\Controllers\Admincontroller@submitaddhotelorder')->name('ad-submitaddhotelorder');
Route::get('ad-edithotelorder/{x}','App\Http\Controllers\Admincontroller@edithotelorder');
Route::post('ad-submitedithotelorder','App\Http\Controllers\Admincontroller@submitedithotelorder')->name('ad-submitedithotelorder');
Route::get('ad-delhotelorder/{x}','App\Http\Controllers\Admincontroller@delhotelorder');

Route::get('ad-flightorder','App\Http\Controllers\Admincontroller@flightorder');
Route::get('ad-addflightorder','App\Http\Controllers\Admincontroller@addflightorder');
Route::post('ad-submitaddflightorder','App\Http\Controllers\Admincontroller@submitaddflightorder')->name('ad-submitaddflightorder');
Route::get('ad-editflightorder/{x}','App\Http\Controllers\Admincontroller@editflightorder');
Route::post('ad-submiteditflightorder','App\Http\Controllers\Admincontroller@submiteditflightorder')->name('ad-submiteditflightorder');
Route::get('ad-delflightorder/{x}','App\Http\Controllers\Admincontroller@delflightorder');

Route::get('ad-editprofile/{x}','App\Http\Controllers\Admincontroller@admineditprofile');

