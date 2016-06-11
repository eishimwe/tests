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
									 `users`.id_number,
									
									 `users`.active

        							"

        							)
        					);

        return Datatables::of($users)->make(true);
    }
}
