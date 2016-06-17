<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Facades\Datatables;


class SponsorsController extends Controller
{


	public function sponsors_list()
    {

        $sponsors_users = \DB::table('users')
                            ->join('contacts','contacts.user_id','=','users.id')
                            ->where('users.referred_by_id','=',\Auth::user()->id)
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
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateAffiliationModal({{$id}});" data-target=".modalEditAffiliation"><i class="fa fa-fw m-r-10 pull-left f-s-18 fa-edit"></i></a>')
                            ->make(true);


    }

    public function sponsored_list()
    {


        $sponsored_users = \DB::table('users')
                            ->join('contacts','contacts.user_id','=','users.id')
                            ->where('users.referred_by_id','=',\Auth::user()->id)
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
        return Datatables::of($sponsored_users)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateAffiliationModal({{$id}});" data-target=".modalEditAffiliation"><i class="fa fa-fw m-r-10 pull-left f-s-18 fa-edit"></i></a>')
                            ->make(true);


    }
     
}
