<?php

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
// Route::get('/login', function(){
//     return view('auth.login');
// });

// Auth::routes();

Route::get('/', 'PagesController@index');

Route::resource('facilities', 'FacilitiesController');
Route::get('/facilities', 'FacilitiesController@index');
Route::get('/createfacility', 'FacilitiesController@create');

Route::resource('activityrequests', 'ActivityRequestsController');
Route::get('/activityrequest', 'ActivityRequestsController@index');
Route::get('/createrequest', 'ActivityRequestsController@create');
Route::get('/approverequest', 'ActivityRequestsController@approve');
Route::get('/showrequest', 'ActivityRequestsController@show');

Route::resource('vehiclerequests', 'VehicleRequestsController');
Route::get('/vehiclerequest', 'VehicleRequestsController@index');
Route::get('/create_vehiclerequest', 'VehicleRequestsController@create');

Route::resource('vehicles', 'VehiclesController');
Route::get('/vehicles', 'VehiclesController@index');
Route::get('/createvehicle', 'VehiclesController@create');




