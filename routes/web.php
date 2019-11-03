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

//Resource routes
Route::resource('/activityrequest', 'ActivityRequestsController');
Route::resource('/facilities', 'FacilitiesController');
Route::resource('/facilityschedule', 'FacilitySchedulesController');
Route::resource('/vehicle', 'VehiclesController');
Route::resource('/vehiclerequest', 'VehicleRequestsController');

// activity request routes
Route::get('/activityrequests', 'ActivityRequestsController@index');
Route::get('/createrequest', 'ActivityRequestsController@create');
Route::get('/approverequests', 'ActivityRequestsController@approve_index');
Route::get('/showrequest', 'ActivityRequestsController@show');
Route::any('/activityrequests/{activityrequest}/approve_update', 'ActivityRequestsController@approve_update');
Route::any('/activityrequests/{activityrequest}/decline_update', 'ActivityRequestsController@decline_update');

// facilities controller
Route::get('/facilities_index', 'FacilitiesController@index');

// facility schedules controller
Route::get('/facilityschedules', 'FacilitySchedulesController@index');
Route::any('/facilityschedules/{facilityschedule}/approve_update', 'FacilitySchedulesController@approve_update');
Route::any('/facilityschedules/{facilityschedule}/decline_update', 'FacilitySchedulesController@decline_update');

//vehicles controller
Route::get('/vehicles', 'VehiclesController@index');
Route::get('/createvehicle', 'VehiclesController@create');

//vehicle requests controller
Route::get('/vehiclerequests', 'VehicleRequestsController@index');
Route::get('/create_vehiclerequest', 'VehicleRequestsController@create');
Route::get('/approve_vehiclerequests', 'VehicleRequestsController@approve_index');
Route::any('/vehiclerequests/{vehiclerequest}/approve_update', 'VehicleRequestsController@approve_update');
Route::any('/vehiclerequests/{vehiclerequest}/decline_update', 'VehicleRequestsController@decline_update');







