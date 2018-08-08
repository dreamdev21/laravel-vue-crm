<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


# OrderType Routes
// List OrderTypes
Route::get('orderTypes', 'OrderTypeController@index')->name('order-types');
//  get one manufacturer type
Route::get('orderType/{id}', 'OrderTypeController@show')->name('pull-order-type');
// Create new manufacturer type
Route::post('orderType', 'OrderTypeController@store')->name('store-order-type');
// Update manufacturer
Route::put('orderType', 'OrderTypeController@store')->name('update-order-type');
// Delete manufacturer
Route::delete('orderType/{id}', 'OrderTypeController@destroy')->name('delete-order-type');

# ResturantMenu Routes
// List OrderTypes
Route::get('resturantMenus', 'ResturantMenuController@index');
//  get one manufacturer type
Route::get('resturantMenu/{id}', 'ResturantMenuController@show');
// Create new manufacturer type
Route::post('resturantMenu', 'ResturantMenuController@store');
// Update manufacturer
Route::put('resturantMenu', 'ResturantMenuController@store');
// Delete manufacturer
Route::delete('resturantMenu/{id}', 'ResturantMenuController@destroy');

# ResturantController Routes
// List OrderTypes
Route::get('resturants', 'ResturantController@index');
//  get one manufacturer type
Route::get('resturant/{id}', 'ResturantController@show');
// Create new manufacturer type
Route::post('resturant', 'ResturantController@store');
// Update manufacturer
Route::put('resturant', 'ResturantController@store');
// Delete manufacturer
Route::delete('resturant/{id}', 'ResturantController@destroy');

# DiningTableStatusController Routes
// List OrderTypes
Route::get('diningTableStatuses', 'DiningTableStatusController@index');
//  get one manufacturer type
Route::get('diningTableStatus/{id}', 'DiningTableStatusController@show');
// Create new manufacturer type
Route::post('diningTableStatus', 'DiningTableStatusController@store');
// Update manufacturer
Route::put('diningTableStatus', 'DiningTableStatusController@store');
// Delete manufacturer
Route::delete('diningTableStatus/{id}', 'DiningTableStatusController@destroy');

# JobStatController Routes
// List Job Status
Route::get('jobStats', 'JobStatController@index');
//  get one Job status
Route::get('jobStat/{id}', 'JobStatController@show');
// Create new  Job status
Route::post('jobStat', 'JobStatController@store');
// Update  Job status
Route::put('jobStat', 'JobStatController@store');
// Delete  Job status
Route::delete('jobStat/{id}', 'JobStatController@destroy');

# LocationController Routes
// List Job Status
Route::get('locations', 'LocationController@index');
//  get one location
Route::get('location/{id}', 'LocationController@show');
// Create new  location
Route::post('location', 'LocationController@store');
// Update  location
Route::put('location', 'LocationController@store');
// Delete  location
Route::delete('location/{id}', 'LocationController@destroy');

# SpareTypeController Routes
// List Spare Types
Route::get('spareTypes', 'SpareTypeController@index');
//  get one spare type
Route::get('spareType/{id}', 'SpareTypeController@show');
// Create new  spare type
Route::post('spareType', 'SpareTypeController@store');
// Update  spare type
Route::put('spareType', 'SpareTypeController@store');
// Delete  spare type
Route::delete('spareType/{id}', 'SpareTypeController@destroy');

# SpareController Routes
// List Spares
Route::get('spares', 'SpareController@index');
//  get one spare 
Route::get('spare/{id}', 'SpareController@show');
// Create new  spare 
Route::post('spare', 'SpareController@store');
// Update  spare 
Route::put('spare', 'SpareController@store');
// Delete  spare
Route::delete('spare/{id}', 'SpareController@destroy');

# RoleTypeController Routes
// List role types
Route::get('roleTypes', 'RoleTypeController@index');
//  get one role type 
Route::get('roleType/{id}', 'RoleTypeController@show');
// Create new  role type 
Route::post('roleType', 'RoleTypeController@store');
// Update  role type 
Route::put('roleType', 'RoleTypeController@store');
// Delete  role type
Route::delete('roleType/{id}', 'RoleTypeController@destroy');

# PriorityController Routes
// List priorities
Route::get('priorities', 'PriorityController@index');
//  get one priority 
Route::get('priority/{id}', 'PriorityController@show');
// Create new  priority 
Route::post('priority', 'PriorityController@store');
// Update  priority 
Route::put('priority', 'PriorityController@store');
// Delete  priority
Route::delete('priority/{id}', 'PriorityController@destroy');

# ModelTypeController Routes
// List model types
Route::get('modelTypes', 'ModelTypeController@index');
//  get one model type 
Route::get('modelType/{id}', 'ModelTypeController@show');
// Create new  model type 
Route::post('modelType', 'ModelTypeController@store');
// Update  model type 
Route::put('modelType', 'ModelTypeController@store');
// Delete  model type
Route::delete('modelType/{id}', 'ModelTypeController@destroy');

# JobTypeController Routes
// List job types
Route::get('jobTypes', 'JobTypeController@index');
//  get one job type 
Route::get('jobType/{id}', 'JobTypeController@show');
// Create new  job type 
Route::post('jobType', 'JobTypeController@store');
// Update  job type 
Route::put('jobType', 'JobTypeController@store');
// Delete  job type
Route::delete('jobType/{id}', 'JobTypeController@destroy');

# JobController Routes
// List job types
Route::get('jobs', 'JobController@index');
//  get one job type 
Route::get('job/{id}', 'JobController@show');
// Create new  job type 
Route::post('job', 'JobController@store');
// Update  job type 
Route::put('job', 'JobController@store');
// Delete  job type
Route::delete('job/{id}', 'JobController@destroy');

# AssetController Routes
// List Assets
Route::get('assets', 'AssetController@index');
//  get one Asset 
Route::get('asset/{id}', 'AssetController@show');
// Create new  Asset 
Route::post('asset', 'AssetController@store');
// Update  Asset 
Route::put('asset', 'AssetController@store');
// Delete  Asset
Route::delete('asset/{id}', 'AssetController@destroy');

# Asset ModelController Routes
// List Asset Models
Route::get('assetModels', 'AssetModelController@index');
//  get one Asset Model
Route::get('assetModel/{id}', 'AssetModelController@show');
// Create new  Asset Model
Route::post('assetModel', 'AssetModelController@store');
// Update  Asset Model
Route::put('assetModel', 'AssetModelController@store');
// Delete  Asset Model
Route::delete('assetModel/{id}', 'AssetModelController@destroy');