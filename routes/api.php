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

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::group(['middleware' => 'jwt.auth'], function ($router) {

    # UserController Routes
    // List Users
    Route::get('users', 'UserController@index');
    //  get one user
    Route::get('user/{id}', 'UserController@show');
    // Create new  user
    Route::post('user', 'UserController@store');
    // Update  user
    Route::put('user', 'UserController@store');
    // Delete  user
    Route::delete('user/{id}', 'UserController@destroy');
    

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

        # CompanyController Routes
    // List companies
    Route::get('companies', 'CompanyController@index');
    //  get one company
    Route::get('company/{id}', 'CompanyController@show');
    // Create new  company
    Route::post('company', 'CompanyController@store');
    // Update  company
    Route::put('company', 'CompanyController@store');
    // Delete  company
    Route::delete('company/{id}', 'CompanyController@destroy');
    // List  company by type = distributor
    Route::get('distributors', 'CompanyController@getDistributors');
     // List  company by type = distributor
     Route::get('customers', 'CompanyController@getCustomers');

        # AccountController Routes
    // List accounts
    Route::get('accounts', 'AccountController@index');
    //  get one account
    Route::get('account/{id}', 'AccountController@show');
    // Create new account
    Route::post('account', 'AccountController@store');
    // Update account
    Route::put('account', 'AccountController@store');
    // Delete account
    Route::delete('account/{id}', 'AccountController@destroy');

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

    # PriorityController Routes
    // List Job priorities
    Route::get('priorities', 'PriorityController@index');
    //  get one job priority 
    Route::get('priority/{id}', 'PriorityController@show');
    // Create new Job priority 
    Route::post('priority', 'PriorityController@store');
    // Update job  priority 
    Route::put('priority', 'PriorityController@store');
    // Delete Job  priority
    Route::delete('priority/{id}', 'PriorityController@destroy');

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
});
Route::post('register', 'AuthController@register');
// Create new account
Route::post('account', 'AccountController@store');
// Create new  company
Route::post('company', 'CompanyController@store');