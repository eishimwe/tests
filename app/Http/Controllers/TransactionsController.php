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

use App\Donation;

use App\DonationAllocation;



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


        //Get amount to payout

        $transaction_payout = TransactionPayout::where('transaction_id',$transaction_id)->first();
        $user_transaction   = UserTransaction::where('transaction_id',$transaction_id)->first();

        $donations = \DB::table('donations')
                                ->select(
                                \DB::raw(
                                    "
                                     `donations`.created_at,
                                     `donations`.id,
                                     `donations`.donation_amount,
                                     `donations`.user_id                                   
                                   
                                    "

                            )
                            )->orderBy('created_at','asc')
                            ->get();


        //user 3 = R1500

        //User 1 = 1500

        //Cron Job is needed here to find a donor


        $transaction_payout_amount = $transaction_payout->payout_amount;

        $donation_allocation       = new DonationAllocation();


        if (sizeof($donations) > 0) {


            foreach ($donations as $donation) {


                if($donation->donation_amount <= $transaction_payout_amount ) {

                    $donation_allocation->donor_id          = $donation->user_id;
                    $donation_allocation->receiver_id       = $user_transaction->user_id;
                    $donation_allocation->donation_amount   = $donation->donation_amount;
                    $donation_allocation->save();
                    $transaction_payout_amount              = $transaction_payout_amount - $donation->donation_amount;


                } else {


                     $donation_allocation->donor_id          = $donation->user_id;
                     $donation_allocation->receiver_id       = $user_transaction->user_id;
                     $donation_allocation->donation_amount   = $donation->donation_amount;
                     $donation_allocation->save();

                     $transaction_payout_amount              = $transaction_payout_amount - $donation->donation_amount;




                }

                if ($transaction_payout_amount <= 0) {


                     $transaction = Transaction::find($transaction_id);
                     $transaction->transaction_type_id = 3; 
                     $transaction->save();
                     break;
                     




                }



                
            
            }


        }
        else {


            $transaction = Transaction::find($transaction_id);
            $transaction->transaction_type_id = 2; 
            $transaction->save();
            

        }


        return redirect('home');

      


    }


    public function gifts_list() {

        $user                = User::find(\Auth::user()->id);

        $gifts_list     = \DB::table('donations_allocation')
                                        ->join('users','users.id','=','donations_allocation.donor_id')
                                        ->join('contacts','contacts.user_id','=','donations_allocation.donor_id')
                                        ->where('donations_allocation.receiver_id','=',\Auth::user()->id)
                                        ->select(
                                                \DB::raw(
                                                    "
                                                     `donations_allocation`.created_at,
                                                     `donations_allocation`.donation_amount,
                                                     `users`.username,
                                                     `users`.first_name,
                                                     `users`.last_name,
                                                     `users`.email,
                                                     `users`.referred_by_id,
                                                     `contacts`.primary_contact
                                                                                  
                                                    "

                                            )
                                        );
                 

        return Datatables::of($gifts_list)
                            ->addColumn('actions','
                                                   
                                                ')
                            ->make(true);


    }

}
