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

Route::get('/', function () {
	if(\Auth::check()==0):
    return view('welcome');
	else:
	return redirect('home');
	endif;
});

Auth::routes();
Route::get('logout',function(){

	\Auth::logout();
	return redirect('/');

});

Route::get('/home', 'HomeController@index');
Route::resource('asset','AssetController');
Route::resource('fdp','FdpController');
Route::resource('companies', 'CompanyController'); 
Route::resource('cost', 'costbenchmarkController'); 
Route::resource('utilities', 'UtilityController');
Route::resource('settings', 'SettingsController');