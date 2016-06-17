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
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateAffiliationModal({{$id}});" data-target=".modalEditAffiliation">View Banking Details</a>')
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
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateAffiliationModal({{$id}});" data-target=".modalEditAffiliation"><i class="fa fa-fw m-r-10 pull-left f-s-18 fa-edit"></i></a>')
                            ->make(true);


    }
     
}
