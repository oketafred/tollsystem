<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Sentinel;
use Activation;
use Session;

class ActivationController extends Controller
{
	
	public function unactivate($email, $activationCode){

		$user = User::whereEmail($email)->first();

		$sentinelUser = Sentinel::findById($user->id);

		if (Activation::remove($sentinelUser)) {

			Activation::create($sentinelUser);

			Session::flash('success', 'Account Deactivated Successfully');

			return redirect()->back();

		}else{

			Session::flash('error', 'Something When wrong. Please try again');

			return redirect()->back();

		}

	}



	public function activate($email, $activationCode){

		$user = User::whereEmail($email)->first();

		$sentinelUser = Sentinel::findById($user->id);

		if (Activation::complete($sentinelUser, $activationCode)) {

			Session::flash('success', 'Account Activated Successfully');

			return redirect()->back();

		}else{

			Session::flash('error', 'Something When wrong. Please try again');

			return redirect()->back();

		}

	}
}
