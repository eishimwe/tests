<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Yajra\Datatables\Facades\Datatables;

class UsersController extends Controller
{
    
    public function index()
    {
        
        $users = \DB::table('users')
        					->select(
        						\DB::raw(
        							"
        							 `users`.id,
        							 `users`.username,
        							 `users`.first_name,
        							 `users`.last_name,
									 `users`.email,
									 `users`.user_registration_statuses_id

        							"

        							)
        					);

        return Datatables::of($users)->make(true);
    }


     public function getuserlandingpage($referral_id) {

        $enums = \Config::get('registrationstatusesenums');
        $activated_user_status = $enums['users_registration_statuses']['activated'];
        $result = User::where('username','=',$referral_id)
                        ->where('user_registration_statuses_id','=',$activated_user_status)->first();

        if ($result) {

            return view('auth.register');
        }
        else {

            return view('auth.login');
        }



    }
}
