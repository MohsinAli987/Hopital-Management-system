<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@userdisplaypage');
Route::post('/get_in_touch_msg', 'HomeController@get_in_touch_msg');
Route::get('/our_doctor', 'HomeController@our_doctor');
Route::get('/contact', 'HomeController@contact');
Route::get('/about', 'HomeController@about');
Route::get('/search', 'HomeController@search');




Auth::routes(['verify' => true]);

// home controller
Route::post('/appoitment_register', 'HomeController@add_appoitment');
Route::get('/my_appointment', 'HomeController@view_my_appointment');
Route::get('/delete_appointment/{id}', 'HomeController@delete_my_appointment');
Route::get('/order_recived_by_user/{id}', 'HomeController@order_recived_by_user');
Route::post('/add_to_cart_and_order_page', 'HomeController@add_to_cart_and_order_page');


// For pharmacy Store
Route::get('/pharmacy_store_home', 'HomeController@pharmacy_store_home');

Route::get('medicine/detail/{id}', 'HomeController@medicine_detail');

// admin controller
Route::get('/add_doctor_view', 'AdminController@addview');
Route::post('/add_doctor_data', 'AdminController@add_doctor');
Route::get('/show_all_doctor', 'AdminController@show_all_doctor_data');
Route::get('/edit_doctor/{id}', 'AdminController@edit_doctor');
Route::post('/update_doctor_data/{id}', 'AdminController@update_doctor_data');
Route::get('/delete_doctor/{id}', 'AdminController@delete_doctor_data');


// for buying medicine
Route::get('/buy/medicine/{id}', 'HomeController@buy_medicine');
Route::get('/show_all_medicine', 'HomeController@show_all_medicine');
Route::get('/add_to_cart_url/{id}', 'HomeController@add_to_cart_url');


Route::post('my_cart', 'HomeController@my_cart');
Route::post('add_to_cart', 'HomeController@add_to_cart');
Route::get('/delete_cart_item/{id}', 'HomeController@delete_cart_item');

Route::post('/request_a_call_back_for_medicine', 'HomeController@request_a_call_back_for_medicine');

// adminlogin
Route::post('/save_order', 'HomeController@save_order');

Route::get('buy_product', 'HomeController@buy_product');
Route::get('/view_my_cart/{id}', 'HomeController@view_my_cart');
Route::get('/my_order', 'HomeController@my_order');




// order deatil page
Route::get('/view_all_order', 'LoginUserController@view_all_order');
Route::get('/payment_online_done/{id}', 'LoginUserController@payment_online_done');
Route::get('/ship_order', 'LoginUserController@ship_order');
Route::get('/shipped_order/{id}', 'LoginUserController@shipped_order');
Route::get('/canacel_order/{id}', 'LoginUserController@canacel_order');
Route::get('/view_shipped_order', 'LoginUserController@view_shipped_order');
Route::get('/cancel_order', 'LoginUserController@cancel_order');
Route::get('/delivered_order', 'LoginUserController@delivered_order');
Route::get('/delete_order/{id}', 'LoginUserController@delete_order');
Route::get('/view_all_msg_about_medicine', 'LoginUserController@view_all_msg_about_medicine');
Route::get('/view_user_call_back_msg_email/{id}', 'LoginUserController@view_user_call_back_msg_email');
Route::post('/send_mail_to_request_call_back_msg/{id}', 'LoginUserController@send_mail_to_request_call_back_msg');
Route::get('/delete_call_back_msg_data/{id}', 'LoginUserController@delete_call_back_msg_data');


// stripe pay online
Route::get('stripe', 'HomeController@stripe');
Route::post('stripe', 'HomeController@stripePost')->name('stripe.post');

// function controller
Route::get('/delete_in_touch_msg_data/{id}', 'FunctionsController@delete_in_touch');
Route::get('/check_appoitment', 'FunctionsController@check_user_appoitment');
Route::get('/approve_appointment/{id}', 'FunctionsController@approve_user_appointment');
Route::get('/cancel_appointment/{id}', 'FunctionsController@cancel_user_appointment');
Route::get('/view_email/{id}', 'FunctionsController@view_send_email');
Route::post('/send_email_to_user/{id}', 'FunctionsController@send_email_to_user');
Route::get('/view_user_data', 'FunctionsController@view_user_data');
Route::get('/edit_user_data/{id}', 'FunctionsController@edit_user_data');
Route::post('/update_user_data/{id}', 'FunctionsController@update_user_data');
Route::get('/delete_user_data/{id}', 'FunctionsController@delete_user_data');
Route::get('/change_user_password/{id}', 'FunctionsController@change_user_password');
Route::post('/update_user_password/{id}', 'FunctionsController@update_user_password');
Route::get('/view_all_in_touch_msg', 'FunctionsController@view_all_in_touch_msg');
Route::get('/view_user_get_in_touch_msg_email/{id}', 'FunctionsController@view_user_get_in_touch_msg_email');
Route::post('/send_mail_to_all_in_touch_msg/{id}', 'FunctionsController@send_mail_to_all_in_touch_msg');
// for pharmacy
Route::get('/view_medicine_to_add', 'FunctionsController@view_medicine_to_add');
Route::post('/add_medicine/{id?}', 'FunctionsController@add_medicine');
Route::get('/view_all_medicine', 'FunctionsController@view_all_medicine');
Route::get('/edit_medicine_data/{id}', 'FunctionsController@edit_medicine_data');
Route::get('/delete_medicine_data/{id}', 'FunctionsController@delete_medicine_data');
// patient funcationlity for admin
Route::get('/add_patient_route', 'FunctionsController@add_patient_route');
Route::post('/add_patient', 'FunctionsController@add_patient');
Route::get('/all_patient_data', 'FunctionsController@all_patient_data');
Route::get('/edit_patient/{id}', 'FunctionsController@edit_patient');
Route::post('/update_patient_data/{id}', 'FunctionsController@update_patient_data');
Route::get('/delete_patient/{id}', 'FunctionsController@delete_patient');
// patient funcationlity for patient
// Route::get('/patient_data_view_record', 'HomeController@patient_data_view_record');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth','verified'])->name('home');