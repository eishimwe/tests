<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Facades\Datatables;

use App\Transaction;

use App\TransactionType;

use App\UserTransaction;

use App\User;

use App\TransactionPayout;

use App\Http\Requests\TransactionAmountRequest;



class TransactionsController extends Controller
{



    public function transactions_list()
    {

        $user = User::find(\Auth::user()->id);

        $transactions_list = \DB::table('users_transactions')
                            ->join('transactions','transactions.id','=','users_transactions.transaction_id')
                            ->join('transactions_types','transactions_types.id','=','transactions.transaction_type_id')
                            ->join('users','users.id','=','users_transactions.user_id')
                            ->join('contacts','contacts.id','=','users.id')              
        					->select(
        						\DB::raw(
        							"
        							 `transactions`.created_at,
        							 `transactions`.id,
        							 `users`.username,
        							 `users`.first_name,
        							 `users`.last_name,
									 `users`.email,
                                    `users`.referred_by_id,
                                    `contacts`.primary_contact,
                                    `transactions_types`.description                                   
                                   
        							"

        					)
        					);

                         

        return Datatables::of($transactions_list)
                            ->addColumn('actions','<a class="btn btn-xs btn-block btn-success" onClick="launchBankModal({{$id}});">View Banking Details</a>')
                            ->make(true);


    }


    public function add_to_payout_queue($username,$reg) {



        $user             = User::where('username',$username)->first();
        
        $transaction_type = TransactionType::where('description','Pending Payout')->first();
        $transaction      = new Transaction();

        $transaction->transaction_type_id = $transaction_type->id;
        $transaction->save();

        $user_transaction                 = new UserTransaction();
        $user_transaction->user_id        = $user->id;
        $user_transaction->transaction_id = $transaction->id;
        $user_transaction->created_by     = \Auth::user()->id;
        $user_transaction->save();


        return redirect('home');



    }

    public function save_transaction_payout_amount(TransactionAmountRequest $request,TransactionPayout $transaction_payout) {

        $response = array();
		
		$transaction_payout->payout_amount  = $request['payout_amount'];
		$transaction_payout->transaction_id = $request['transactionID'];
        $transaction_payout->save();

        $response["message"]   = "Transaction Payout Amount Added!";
        $response["error"]     = FALSE;
        $response["meetingID"] = $request['transactionID'];

        return \Response::json($response,201);

        //\Session::flash('success','Donation added');
        //return redirect('donations-details');



    }

}
