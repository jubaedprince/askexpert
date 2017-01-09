<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/admin/expert/reindex', 'ExpertController@reindex');
Route::get('/admin/service/reindex', 'ServiceController@reindex');


Route::get('/', 'PagesController@home');

Auth::routes();

Route::get('/home', 'HomeController@index');

//expert

//expert registration form
Route::get('/expert/register', 'ExpertController@register');
//expert registration processing
Route::post('/expert/register', 'ExpertController@processRegistration');
//expert change status
Route::post('/expert/{expert_id}', 'ExpertController@changeStatus');

Route::get('/service/create', 'ServiceController@create');
Route::post('/service', 'ServiceController@store');



Route::get('/admin/expert/{expert}', 'ExpertController@adminShow');
Route::get('/admin/service/{service}', 'ServiceController@adminShow');
Route::get('/admin/meeting/{meeting}', 'MeetingController@adminShow');

Route::get('/admin/expert', 'AdminController@expertManagement');
Route::get('/admin/service', 'AdminController@serviceManagement');
Route::get('/admin/meeting', 'AdminController@meetingManagement');


Route::post('/admin/service/{service_id}', 'ServiceController@changeIsApproved');
Route::get('/expert/', 'ExpertController@index');
Route::get('/service/', 'ServiceController@index');

Route::get('/contact/', 'PagesController@contact');

Route::get('/{expert_slug}', 'ExpertController@profile');

//call counter
Route::post('/expert/{expert}/call', 'ExpertController@incrementCallCounter');
Route::delete('/expert/{expert}/call', 'ExpertController@decrementCallCounter');
Route::put('/expert/{expert}/profile-picture', 'ExpertController@updateProfilePicture');
Route::post('/expert/{expert}/meeting', 'MeetingController@store');
Route::get('/expert/{expert}/edit', 'ExpertController@edit');
Route::put('/expert/{expert}', 'ExpertController@update');

Route::post('/search', 'SearchController@search');