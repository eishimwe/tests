<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Facades\Datatables;

use App\User;


class SponsorsController extends Controller
{


	public function sponsors_list()
    {

        $user = User::find(\Auth::user()->id);

        $sponsors_users = \DB::table('users')
                            ->join('contacts','contacts.user_id','=','users.id')
                            ->where('users.id','=',$user->referred_by_id)
        					->select(
        						\DB::raw(
        							"
        							 `users`.id,
        							 `users`.username,
        							 `users`.first_name,
        							 `users`.last_name,
									 `users`.email,
                                     `contacts`.`primary_contact`

        							"

        					)
        					);

                         

        return Datatables::of($sponsors_users)
                            ->addColumn('actions','<a class="btn btn-xs btn-block btn-success" data-toggle="modal" onClick="launchBankModal({{$id}});" data-target=".modalBank">View Banking Details</a>')
                            ->make(true);


    }

    public function sponsored_list()
    {


        $sponsored_users = \DB::table('users')
                            ->join('contacts','contacts.user_id','=','users.id')
                            ->join('user_registration_statuses','user_registration_statuses.id','=','users.user_registration_statuses_id')
                            ->where('users.referred_by_id','=',\Auth::user()->id)
                            ->select(
                                \DB::raw(
                                    "
                                     `users`.id,
                                     `users`.username,
                                     `users`.first_name,
                                     `users`.last_name,
                                     `users`.email,
                                     `contacts`.`primary_contact`,
                                     `user_registration_statuses`.`description`
                                    "

                            )
                            );
        return Datatables::of($sponsored_users)
                            ->addColumn('actions','<a href="javascript:;" class="btn btn-success m-r-5 m-b-5 active">Confirm Registration Fees Payment</a>
')
                            ->make(true);




    }


  
     
}
