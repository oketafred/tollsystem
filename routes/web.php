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

// Visitors Routes
Route::group(['middleware' => 'visitors'], function(){

	Route::get('/', function(){
		return view('index');
	});

	// Login Route
	Route::get('/login', 'AccountController@getLogin')->name("login");
	Route::post('login', 'AccountController@processLogin')->name("login");

	// Register Route
	Route::get('register', 'AccountController@getRegister')->name('register');
	Route::post('register', 'AccountController@postRegister')->name('register');
	
	// Forgot Password Route
	Route::get('forgot_password', function () {
		return view('forgot_password');
	})->name('forgot_password');
});

// Logout Route
Route::post('logout', 'AccountController@logout')->name("logout");




// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
	
	Route::get('admin_dashboard', 'AdminController@admin')->name('admin_dashboard');

	Route::get('view_registration', 'AdminController@viewRegistration')->name('view_registration');

	Route::get('view_registered', 'AdminController@viewRegistered')->name('view_registered');

	Route::get('view_rejected', 'AdminController@viewRejected')->name('view_rejected');

	Route::get('activate/{email}/{activationCode}', 'ActivationController@activate')->name("activation");

	Route::get('unactivate/{email}/{activationCode}', 'ActivationController@unactivate')->name("unactivation");

	Route::get('topup', 'TopUpController@topsearch')->name('topup');

	Route::get('topup/{rfid}', 'TopUpController@userDetail')->name('user.detail');

	Route::post('topup', 'TopUpController@searchTopup')->name('topup');

	Route::post('topup_amount', 'TopUpController@topupAmount')->name('topup_amount');

	Route::get('toll_plaza', 'TollPlazaMasterController@index')->name('toll_plaza');

	Route::post('toll_plaza_store', 'TollPlazaMasterController@storePrices')->name('storePrices');
	Route::post('toll_plaza_update', 'TollPlazaMasterController@updatePrices')->name('updatePrices');

	Route::get('profile', 'PasswordController@adminProfileEdit')->name('adminProfileEdit');

	Route::post('resetpasswordcomplete', 'PasswordController@adminUpdate')->name('admin.reset.password.complete');

});


// User Routes
Route::group(['prefix' => 'user', 'middleware' => 'user'], function(){
	Route::get('topup_history', 'UserController@topup_history')->name('topup_history');

	Route::get('spending_history', 'UserController@spending_history')->name('spending_history');

	Route::get('profile', 'PasswordController@userProfileEdit')->name('userProfileEdit');

	Route::post('resetpasswordcomplete', 'PasswordController@userUpdate')->name('user.reset.password.complete');
});
