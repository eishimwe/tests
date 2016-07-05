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
                                     `transactions`.`transaction_amount`,
                                     `transactions`.`transaction_payout_date`,
                                     `users`.referred_by_id,
                                     `contacts`.primary_contact,
                                     `transactions_types`.description                                   
                                   
        							"

        					)
        					);

                         

        return Datatables::of($transactions_list)
                            ->addColumn('actions','
                                                   
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

    public function save_transaction_payout_amount(TransactionAmountRequest $request,Transaction $transaction) {

        $response                             = array();   
        $transaction                          = Transaction::find($request['transactionID']);
        $transaction->transaction_amount      = $request['transaction_amount'];
        $transaction->transaction_payout_date = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
        $transaction->save();
        
        $response["message"]                  = "Transaction Payout Amount Added!";
        $response["error"]                    = FALSE;
        $response["meetingID"]                = $request['transactionID'];

        return \Response::json($response,201);


    }

    public function start_transaction() {


         $today_date                          = \Carbon\Carbon::now('Africa/Johannesburg')->toDateString();
         $donations_allocation_statuses_enums = \Config::get('donationallocationstatusesenums');
         $donations_statuses_enums            = \Config::get('donationstatusesenums');
         $transactions_types_enums            = \Config::get('transactiontypesenums');

        $transactions    = \DB::table('transactions')
                                    ->where('transaction_payout_date','LIKE','%'.$today_date.'%')
                                    ->whereNotNull('transaction_amount')
                                    ->select(
                                    \DB::raw(
                                        "
                                         `transactions`.created_at,
                                         `transactions`.id,
                                         `transactions`.transaction_amount,
                                         SUM(`transaction_amount`) as Total_Transactions_amounts                                                              
                                       
                                        "

                                            )
                                    )->orderBy('created_at','asc')
                                    ->get();



        $donations  = \DB::table('donations')
                        
                                        ->where('donation_status_id','=',$donations_statuses_enums['donations_statuses']['available'])
                                        ->select(
                                                \DB::raw(
                                                    "
                                                     `donations`.`created_at`,
                                                     `donations`.`id`,
                                                     (`donations`.`donation_amount` - ifnull((SELECT SUM(`donation_amount`) FROM `donations_allocation` WHERE `donations_allocation`.`donation_id` = `donations`.`id`),0)) as 'donation_amount',
                                                     `donations`.user_id,
                                                     `donations`.is_valid                                    
                                                   
                                                    "

                                                    )
                                                )
                                        ->orderBy('created_at','asc')
                                        ->get();

        
       

        

         if(sizeof($transactions) > 0) {


                if(sizeof($donations) > 0) {


                       foreach ($transactions as $transaction) {

                                $transaction_amount = $transaction->transaction_amount;
                                $user_transaction   = UserTransaction::where('transaction_id',$transaction->id)->first();

                            foreach ($donations as $donation) {


                                if ($donation->donation_amount < $transaction_amount) {

                                        $donation_allocation                    = new DonationAllocation();
                                        $donation_allocation->donor_id          = $donation->user_id;
                                        $donation_allocation->receiver_id       = $user_transaction->user_id;
                                        $donation_allocation->transaction_id    = $transaction->id;
                                        $donation_allocation->donation_amount   = $donation->donation_amount;
                                        $donation_allocation->donation_id       = $donation->id;
                                        $donation_allocation->donation_status   = $donations_allocation_statuses_enums['donations_allocation_statuses']['allocated'];
                                        $donation_allocation->save();


                                        $objTransaction                         = Transaction::find($transaction->id);
                                        $objTransaction->transaction_amount     = ($transaction_amount - $donation->donation_amount);
                                        $objTransaction->transaction_type_id    = $transactions_types_enums['transactions_types']['Pending Donor Allocation']; 
                                        $objTransaction->save();


                                        $objDonation                             = Donation::find($donation->id);
                                        $objDonation->donation_status_id         = $donations_statuses_enums['donations_statuses']['complete']; 
                                        $objDonation->save();




                                }

                                else {

                                      
                                        $donation_allocation                    = new DonationAllocation();
                                        $donation_allocation->donor_id          = $donation->user_id;
                                        $donation_allocation->receiver_id       = $user_transaction->user_id;
                                        $donation_allocation->transaction_id    = $transaction->id;
                                        $donation_allocation->donation_amount   = $transaction_amount;
                                        $donation_allocation->donation_id       = $donation->id;
                                        $donation_allocation->donation_status   = $donations_allocation_statuses_enums['donations_allocation_statuses']['allocated'];
                                        $donation_allocation->save();


                                        $objTransaction                         = Transaction::find($transaction->id);
                                        $objTransaction->transaction_type_id    = $transactions_types_enums['transactions_types']['Pending Payment Confirmation'];
                                        $objTransaction->transaction_amount     = 0;
                                        $objTransaction->save();

                                        break;


                                }


                                

                            }
                    

                    
                        }


                } else {

                        //Transaction but no donations

                }


         }

         return \Redirect::back();


    }


    public function gifts_list() {

        $donations_allocation_statuses_enums = \Config::get('donationallocationstatusesenums');

        $user          = User::find(\Auth::user()->id);

        $gifts_list     = \DB::table('donations_allocation')
                                        ->join('users','users.id','=','donations_allocation.donor_id')
                                        ->join('contacts','contacts.user_id','=','donations_allocation.donor_id')      
                                        ->where('donations_allocation.receiver_id','=',\Auth::user()->id)
                                        ->select(
                                                \DB::raw(
                                                    "
                                                     `donations_allocation`.created_at,
                                                     `donations_allocation`.id,
                                                     `donations_allocation`.donation_amount,
                                                     `donations_allocation`.transaction_id,
                                                     `donations_allocation`.donation_status,
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
                                                  @if ($donation_status == 1)
                                                   <a href="confirm-donor-payment/{{$id}}" class="btn btn-xs btn-block btn-success">
                                                            Confirm Payment
                                                    </a>
                                                  @endif
                                                ')
                            ->make(true);


    }

    public function my_donations_list() {

        $user                  = User::find(\Auth::user()->id);

        $my_donations_list     = \DB::table('donations_allocation')
                                        ->join('users','users.id','=','donations_allocation.receiver_id')
                                        ->join('contacts','contacts.user_id','=','donations_allocation.receiver_id')
                                        ->where('donations_allocation.donor_id','=',\Auth::user()->id)
                                        ->select(
                                                \DB::raw(
                                                    "
                                                     `donations_allocation`.created_at,
                                                     `donations_allocation`.donation_amount,
                                                     `donations_allocation`.transaction_id,
                                                     `donations_allocation`.donation_status,
                                                     `users`.username,
                                                     `users`.first_name,
                                                     `users`.last_name,
                                                     `users`.email,
                                                     `users`.id,
                                                     `users`.referred_by_id,
                                                     `contacts`.primary_contact
                                                                                  
                                                    "

                                            )
                                        );
                 

        return Datatables::of($my_donations_list)
                            ->addColumn('actions','<a class="btn btn-xs btn-block btn-success" onClick="launchBankModal({{$id}});">View Banking Details</a>')
                            ->make(true);


    }

}
