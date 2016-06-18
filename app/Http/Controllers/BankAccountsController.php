<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\BankAccount;

use Yajra\Datatables\Facades\Datatables;

class BankAccountsController extends Controller
{
    
    public function index(){


    	return view('banks.list');


    }


    public function banking_list(){

        $banking_list = \DB::table('bank_accounts')
                    ->join('bank_types','bank_types.id','=','bank_accounts.bank_type_id')
					->select(
						\DB::raw(
							"
							 `bank_types`.description,
							 `bank_types`.id,
							 `bank_accounts`.account_number,
							 `bank_accounts`.account_holder,
							 `bank_accounts`.branch_name,
							 `bank_accounts`.branch_code
							"
							)
					);

        return Datatables::of($banking_list)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateAffiliationModal({{$id}});" data-target=".modalEditAffiliation"><i class="fa fa-fw m-r-10 pull-left f-s-18 fa-edit"></i></a>')
                            ->make(true);



    }


    public function add_form() {

    	return view('banks.add');
    }
}
