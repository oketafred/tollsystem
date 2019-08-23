<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;
use App\Topup;
use Session;

use AfricasTalking\SDK\AfricasTalking;


class TopUpController extends Controller
{
	public function topsearch (){

		$search_results = Sentinel::findRoleBySlug('user')->users()->with('roles')->paginate(15);

		return view('admin.topup.index', compact('search_results'));

	}

	public function searchTopup (Request $request){

		$search_results = User::where('rfid', 'LIKE', '%' . $request->searchTerm . '%')->paginate(15);

		return view('admin.topup.search_result', compact('search_results'));

	}

	public function userDetail($id) {

		$user = User::where('rfid', $id)->first();

		return view('admin.topup.user_detail', compact('user'));
	}

	public function topupAmount(Request $request){

		$topup = new Topup;

		$topup->amount = $request->topup_amount;
		$topup->user_id = $request->user_id;

		$topup->save();

		$this->sendSMS($topup->user->phone_number, $topup->user->full_name, $topup->amount);

		Session::flash('success', 'Top up for $$topup->user->fullname Successful');

		return redirect()->back();

	}

	public function sendSMS ($mobile_number, $fullname, $topup_amount){
		// SMS Section Here
		$username = 'oketafred'; // use 'sandbox' for development in the test environment
		$apiKey   = '22833e72f851a589314e518b3dbb873e8dedfc9586cbf9a93a281bf748a24015'; // use your sandbox app API key for development in the test environment
		$AT       = new AfricasTalking($username, $apiKey);

			// Get one of the services
		$sms      = $AT->sms();

			// Use the service
		$result   = $sms->send([
			'to'      => $mobile_number,
			'message' => "Dear $fullname,\nYou have deposited $topup_amount in your Toll System account.\nThank you."
		]);
	}
}


