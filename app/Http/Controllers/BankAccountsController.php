<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\BankRequest;

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
                    ->where('bank_accounts.user_id',\Auth::user()->id)
                    ->where('active',1)
					->select(
						\DB::raw(
							"
							 `bank_types`.description,
							 `bank_types`.id,
							 `bank_accounts`.account_number,
							 `bank_accounts`.account_holder,
							 `bank_accounts`.branch_name,
							 `bank_accounts`.branch_code,
                             `bank_accounts`.id,
                             `bank_accounts`.user_id
							"
							)
					);

        return Datatables::of($banking_list)
                            ->addColumn('actions','<a href="delete_bank/{{$id}}" class="btn btn-xs btn-alt"><i class="fa fa-fw m-r-10 pull-left f-s-18 fa-trash"> Delete</i></a>')
                            ->make(true);



    }

    function sponsors_banking_list($id) {


        $sponsors_banking_list = \DB::table('bank_accounts')
                    ->join('bank_types','bank_types.id','=','bank_accounts.bank_type_id')
                    ->where('bank_accounts.user_id',$id)
                    ->select(
                        \DB::raw(
                            "
                             `bank_types`.description,
                             `bank_types`.id,
                             `bank_accounts`.account_number,
                             `bank_accounts`.account_holder,
                             `bank_accounts`.branch_name,
                             `bank_accounts`.branch_code,
                             `bank_accounts`.id,
                             `bank_accounts`.user_id
                           


                            "
                            )
                    );

        return Datatables::of($sponsors_banking_list)->make(true);



    }


    public function add_form() {

    	return view('banks.add');
    }


    public function save_bank(BankRequest $request,BankAccount $BankAccount) {

        $BankAccount->account_holder      = $request['account_holder'];
        $BankAccount->account_number      = $request['account_number'];
        $BankAccount->bank_type_id        = $request['bank_type_id'];
        $BankAccount->branch_code         = $request['branch_code'];
        $BankAccount->user_id             = \Auth::user()->id;
        $BankAccount->active              = 1;
        $BankAccount->save();

        \Session::flash('success','Bank Account added');

        return redirect('banking-details');



    }

    public function delete_bank(BankAccount $BankAccount,$id) {

        $BankAccount         = BankAccount::find($id);
        $BankAccount->active = 0;
        $BankAccount->save();
       

        \Session::flash('success','Bank deleted');

        return redirect('banking-details');


        
    }
}
