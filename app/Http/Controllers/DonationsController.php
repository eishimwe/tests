<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Facades\Datatables;


class DonationsController extends Controller
{


	public function index(){


    	return view('donations.list');


    }

    
     public function donations_list(){

        $donations_list = \DB::table('donations')
                    ->join('users','users.id','=','donations.user_id')
                    ->where('donations.is_valid',1)
                    ->where('donations.user_id',\Auth::user()->id)
					->select(
						\DB::raw(
							"
							 `donations`.id,
							 `donations`.donation_amount,
							 `donations`.returns_percentage,
							 `donations`.created_at
							
							"
							)
					);

        return Datatables::of($donations_list)
                            ->addColumn('actions','<a href="delete_bank/{{$id}}" class="btn btn-xs btn-alt"><i class="fa fa-fw m-r-10 pull-left f-s-18 fa-trash"> Delete</i></a>')
                            ->make(true);



    }
}
