<?php

use App\Http\Controllers\ArtController;
use App\Http\Controllers\HomeController;
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
    return view('index');
});
Route::resource('/arts','ArtController');
Route::resource('/frames', 'FrameController');
Route::resource('/liners', 'LinerController');


Auth::routes();
Route::post('/registerPage', 'HomeController@saveDesign');
Route::get('/registerPage', 'HomeController@showRegisterPage');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/get_session', 'UserController@getSession');

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('auth','is_admin');
Route::post('/print_page', 'HomeController@printPage');
Route::post('/quote_page', 'HomeController@quotePage');
Route::post('/order_page', 'HomeController@orderPage');
Route::post('/save_custom_image', 'HomeController@saveCustomImage');
Route::get('resetDesign','HomeController@resetDesign');
Route::post('quote_mail', 'HomeController@sendQuoteMail');
Route::post('order_mail', 'HomeController@sendOrderMail');
Route::get('frame_sample', 'HomeController@frameSample');
Route::get('postOrder', function(){ 
    return view('postOrder');
});
Route::post('checkout_frames_sample', 'HomeController@checkoutSample');
Route::post('mail_sample_frames', 'HomeController@sendSampleMail');