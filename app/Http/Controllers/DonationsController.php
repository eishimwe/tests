<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Facades\Datatables;

use App\Donation;

use App\DonationAllocation;

use App\Transaction;

use App\TransactionType;

use App\TransactionPayout;

use App\UserTransaction;

use App\Http\Requests\DonationRequest;


class DonationsController extends Controller
{


	public function index(){


    	return view('donations.list');


    }

    
     public function donations_list(){

        $donations_list = \DB::table('donations')
                    ->join('users','users.id','=','donations.user_id')
                    ->where('donations.user_id',\Auth::user()->id)
					->select(
						\DB::raw(
							"
							 `donations`.id,
							 `donations`.donation_amount,
							 `donations`.returns_percentage,
							 `donations`.created_at,
                             `donations`.is_valid
							
							"
							)
					);

        return Datatables::of($donations_list)
                            ->addColumn('actions','<a href="delete_bank/{{$id}}" class="btn btn-xs btn-alt"></a>')
                            ->make(true);



    }

    public function all_donations(){

        $all_donations = \DB::table('donations')
                    ->join('users','users.id','=','donations.user_id')
                    ->join('contacts','contacts.user_id','=','donations.user_id')
                    ->join('donations_statuses','donations_statuses.id','=','donations.donation_status_id')
                    ->select(
                        \DB::raw(
                            "
                             `donations`.created_at,
                             `donations`.id,
                             `users`.username,
                             `users`.first_name,
                             `users`.last_name,
                             `contacts`.primary_contact,
                             `donations`.donation_amount,
                             (SELECT SUM(`donation_amount`) FROM `donations_allocation` WHERE `donation_id` = `donations`.id) as donated_amount,
                             `donations`.returns_percentage,
                             `donations_statuses`.description                             
                            
                            "
                            )
                    )->orderBy('created_at','asc');

        return Datatables::of($all_donations)
                            ->addColumn('actions','<a href="delete_bank/{{$id}}" class="btn btn-xs btn-alt"></a>')
                            ->make(true);



    }


    public function add_donation() {

    	return view('donations.add');
    }


     public function save_donation(DonationRequest $request,Donation $Donation) {

        $donations_statuses_enums            = \Config::get('donationstatusesenums');


        $Donation->donation_amount    = $request['donation_amount'];
        $Donation->user_id            = \Auth::user()->id;
        $Donation->donation_status_id = $donations_statuses_enums['donations_statuses']['available'];
        $Donation->returns_percentage = 30;
        $Donation->save();

        \Session::flash('success','Donation added');
        return redirect('donations-details');



    }


    public function confirm_donor_payment($donation_allocation_id) {

        $donations_allocation_enums          = \Config::get('donationallocationstatusesenums');
        $transaction_types_enums             = \Config::get('transactiontypesenums');


    
        $donation_allocation                  = DonationAllocation::find($donation_allocation_id);
        $donor_id                             = $donation_allocation->donor_id;
        $donation_amount                      = $donation_allocation->donation_amount;     
        $donation_allocation->donation_status = $donations_allocation_enums['donations_allocation_statuses']['complete'];
        $donation_allocation->save();

        $original_donor_donation             = Donation::find($donation_allocation->donation_id);
        $donation_return                     = $original_donor_donation->donation_amount + ($original_donor_donation->donation_amount * 30)/100; 
        $all_donor_donations                 = DonationAllocation::where('donation_id',$donation_allocation->donation_id)->where('donation_status',3)->get();
        $total_donor_donations               = 0;
                  

        foreach ($all_donor_donations as $all_donor_donation) {
            

            $total_donor_donations += $all_donor_donation->donation_amount;
            $transaction_id  = $all_donor_donation->transaction_id;
        }


        if ($original_donor_donation->donation_amount == $total_donor_donations) {

            
            $date                                 = \Carbon\Carbon::now('Africa/Johannesburg');
            $date                                 = $date->addDay(30)->toDateString();
            $transaction_type                     = TransactionType::where('description','Pending Payout')->first();
            $transaction                          = new Transaction();
            $transaction->transaction_amount      = $donation_return;
            $transaction->transaction_payout_date = $date;
            
            $transaction->transaction_type_id     = $transaction_type->id;   
            $transaction->save();
            
            
            $user_transaction                 = new UserTransaction();
            $user_transaction->user_id        = $donation_allocation->donor_id;
            $user_transaction->transaction_id = $transaction->id;
            $user_transaction->created_by     = \Auth::user()->id;
            $user_transaction->save();


        }




        $transaction_id                = $donation_allocation->transaction_id;

        $all_donations_transactions_no = DonationAllocation::where('transaction_id',$transaction_id)->count();     
        $all_donations_transactions    = DonationAllocation::where('transaction_id',$transaction_id)->get();    
        $complete_transaction_no       = 0;

        foreach ($all_donations_transactions as $all_donations_transaction) {

            if ($all_donations_transaction->donation_status == 1) {

                 $complete_transaction_no ++ ;
            }

        }

        if ($all_donations_transactions_no == $complete_transaction_no) {

            $transaction  = Transaction::find($transaction_id);
            $transaction->transaction_type_id = $transaction_types_enums['transactions_types']['Payment Confirmed'];
            $transaction->save();
        }

        return redirect('home');

    }

    

}
