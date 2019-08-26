<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TollPlazaMaster;
use Session;

class TollPlazaMasterController extends Controller
{
	public function index() {

		$toll_plaza_master_price = TollPlazaMaster::first();

		return view('admin.toll_plaza_master', compact('toll_plaza_master_price'));

	}

	public function storePrices(Request $request) {

		$toll_plaza_master = new TollPlazaMaster;

		$toll_plaza_master->lorry = $request->lorry;
		$toll_plaza_master->car = $request->car;
		$toll_plaza_master->bus =$request->bus;

		$toll_plaza_master->save();

		Session::flash('sucess', 'Toll Plaza Prices Set Successfully');

		return redirect()->back();

	}


	public function updatePrices(Request $request) {

		// dd($request->all());

		$toll_plaza_master = TollPlazaMaster::findOrFail($request->id);

		$toll_plaza_master->lorry = $request->lorry;
		$toll_plaza_master->car = $request->car;
		$toll_plaza_master->bus =$request->bus;

		$toll_plaza_master->save();

		Session::flash('sucess', 'Toll Plaza Prices Updated Successfully');

		return redirect()->back();

	}
}
