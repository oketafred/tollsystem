<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Sentinel;
use App\Topup;

class AdminController extends Controller
{

	public function admin (){

		$topup_count = Topup::count();

		$registered_users_count = DB::table('activations')
		->join('users', 'users.id', '=', 'activations.user_id')
		->where('users.id', '!=', 1)
		->where('activations.completed', '=', 1)
		->count();

		$rejected_users_count = DB::table('activations')
		->join('users', 'users.id', '=', 'activations.user_id')
		->where('users.id', '!=', 1)
		->where('activations.completed', '=', 0)
		->select('users.*', 'activations.*')
		->count();

		$first_chart = [
			'groups' => ['No of Active Users', 'No of InActive Users'],
			'data' => [$registered_users_count, $rejected_users_count]
		];

		$second_chart = [
			'groups' => ['No of Top Ups', 'No of Active Users'],
			'data' => [$topup_count, $registered_users_count]
		];

		return view('admin.admin_dashboard', compact('topup_count', 'registered_users_count', 'rejected_users_count', 'first_chart', 'second_chart'));

	}

	public function viewRegistration(){


		$users = DB::table('activations')
		->join('users', 'users.id', '=', 'activations.user_id')
		->where('users.id', '!=', 1)
		->select('users.*', 'activations.*')
		->get();

		// dd($users);

		// $users = Sentinel::findRoleBySlug('user')->users()->with('roles')->get();

		return view('admin.user.registration', compact('users'));
	}

	public function viewRegistered (){

		$registered_users = DB::table('activations')
		->join('users', 'users.id', '=', 'activations.user_id')
		->where('users.id', '!=', 1)
		->where('activations.completed', '=', 1)
		->select('users.*', 'activations.*')
		->get();

		return view('admin.user.registered', compact('registered_users'));

	}

	public function viewRejected(){

		$rejected_users = DB::table('activations')
		->join('users', 'users.id', '=', 'activations.user_id')
		->where('users.id', '!=', 1)
		->where('activations.completed', '=', 0)
		->select('users.*', 'activations.*')
		->get();

		// dd($rejected_users);

		return view('admin.user.rejected', compact('rejected_users'));

	}
}
