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
                                     (SELECT `payout_amount` from `transactions_payouts` where `transaction_id` = `transactions`.`id`) as 'transaction_payout_amount',
                                    `users`.referred_by_id,
                                    `contacts`.primary_contact,
                                    `transactions_types`.description                                   
                                   
        							"

        					)
        					);

                         

        return Datatables::of($transactions_list)
                            ->addColumn('actions','
                                                    @if($transaction_payout_amount && ($description == "Pending Payout")) 
                                                        <a href="start-transaction-payout/{{$id}}" class="btn btn-xs btn-block btn-success">
                                                            Start Payout
                                                        </a>
                                                    @endif
                                                ')
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

        //\Session::flash('success','Donation added');

        return \Response::json($response,201);


    }

    public function start_transaction_payout($transaction_id) {


        $transaction = Transaction::find($transaction_id);
        $transaction->transaction_type_id = 2; //Pending Donor Allocation
        $transaction->save();


        return redirect('home');

        //2. The users on the payout queue statuses should be changed to "Pending Donor Allocation".

    }


    public function gifts_list() {

        $user = User::find(\Auth::user()->id);


        $number_of_gifts           = \DB::table('transactions_payouts')
                                        ->join('transactions','transactions.id','=','transactions_payouts.transaction_id')
                                        ->join('users_transactions','users_transactions.transaction_id','=','transactions_payouts.transaction_id')
                                        ->where('users_transactions.user_id','=',\Auth::user()->id)
                                        ->select(
                                                \DB::raw(
                                                    "
                                                     `transactions_payouts`.created_at,
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
                 

        return Datatables::of($gifts_list)
                            ->addColumn('actions','
                                                    @if($transaction_payout_amount && ($description == "Pending Payout")) 
                                                        <a href="start-transaction-payout/{{$id}}" class="btn btn-xs btn-block btn-success">
                                                            Start Payout
                                                        </a>
                                                    @endif
                                                ')
                            ->make(true);


    }

}
