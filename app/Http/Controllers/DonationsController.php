<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Facades\Datatables;

use App\Donation;

use App\DonationAllocation;

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
                             `donations`.returns_percentage,
                             `donations`.is_valid                             
                            
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

		$Donation->donation_amount    = $request['donation_amount'];
		$Donation->user_id            = \Auth::user()->id;
		$Donation->is_valid           = 1;
		$Donation->returns_percentage = 30;
        $Donation->save();

        \Session::flash('success','Donation added');
        return redirect('donations-details');



    }


    public function confirm_donor_payment($donation_allocation_id) {

        $donation_allocation                  = DonationAllocation::find($donation_allocation_id);     
        $donation_allocation->donation_status = 1;
        $donation_allocation->save();

        return redirect('home');

    }

    

}
