<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Session;
use Sentinel;
use Validator;
use Activation;


class AccountController extends Controller
{

	// Display Login Page
	public function getLogin(){

		return view("login");

	}

	// Process Login Form
	public function processLogin(Request $request){

		try{

			$validator = Validator::make($request->all(), [
				'email' => 'required',
				'password' => 'required'
			]);

			if ($validator->fails()) {

				Session::flash('error', 'All Fields are Required!');

				return redirect()->back();
			}

			if (Sentinel::authenticate($request->all())) {
				$slug = Sentinel::getUser()->roles()->first()->slug;

				if ($slug == "admin") {
					return redirect()->route('admin_dashboard');
				}elseif ($slug == "user") {
					return redirect()->route('topup_history');
				}
			}else{

				Session::flash('error', 'Wrong Credentials!');

				return redirect()->back();

			}

		}catch(ThrottlingException $ex){
			$delay = $ex->getDelay()/60;

			Session::flash('error', "You have been locked out. For $delay");

			return redirect()->back();

		}catch(NotActivatedException $ex){

			Session::flash('error', 'You account is waiting Approval by the Administrator. Please wait.');

			return redirect()->back();

		}

	}

	// Get Register Form 
	public function getRegister () {

		return view('register');
	}

	    // Process Register
	public function postRegister(Request $request){

		$validator = Validator::make($request->all(), [
			'email' => 'required',
			'password' => 'required',
			'full_name' => 'required',
			'phone_number' => 'required',
			'username' => 'required',
			'rfid' => 'required',
			'city' => 'required',
			'country' => 'required',
			'vehicle_type' => 'required',
		]);

		if ($validator->fails()) {

			Session::flash('error', 'All Fields are Required!');

			return redirect()->back();
		}


		$credentials = [
			'email' => $request->email,
			'password' => $request->password,
			'full_name' => $request->full_name,
			'phone_number' => $request->phone_number,
			'username' => $request->username,
			'rfid' => $request->rfid,
			'city' => $request->city,
			'country' => $request->country,
			'vehicle_type' => $request->vehicle_type,
		];

		//dd($credentials);

		$user = Sentinel::register($credentials);

		$activation = Activation::create($user);

		$role = Sentinel::findRoleBySlug("user");

		$role->users()->attach($user);

		Session::flash('success', 'Registration Successfully');

		return redirect('/');

	}

	// Logout
	public function logout(){

		Sentinel::logout();

		return redirect('/');

	}


}
