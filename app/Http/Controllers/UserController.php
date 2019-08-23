<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Topup;

class UserController extends Controller
{
    public function topup_history() {

        $user = Sentinel::getUser();

        $user_top_historys = Topup::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();

		return view('users.topup_history', compact('user_top_historys', 'user'));
    }
    
    public function spending_history() {
        return view('users.spending_history');
    }
}
