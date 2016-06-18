<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Facades\Datatables;

use App\User;

use App\UserRegistration;


class SponsorsController extends Controller
{


	public function sponsors_list()
    {

        $user = User::find(\Auth::user()->id);

        $sponsors_users = \DB::table('users_registrations')
                            ->join('contacts','contacts.user_id','=','users_registrations.sponsor_user_id')
                            ->join('users','users.id','=','users_registrations.sponsor_user_id')
                            ->where('users_registrations.sponsored_user_id','=',\Auth::user()->id)
        					->select(
        						\DB::raw(
        							"
        							 `users`.id,
        							 `users`.username,
        							 `users`.first_name,
        							 `users`.last_name,
									 `users`.email,
                                    `users`.referred_by_id,
                                    `contacts`.`primary_contact`,
                                    `users_registrations`.`amount_due`,
                                    `users_registrations`.`paid`

        							"

        					)
        					);

                         

        return Datatables::of($sponsors_users)
                            ->addColumn('actions','<a class="btn btn-xs btn-block btn-success" data-toggle="modal" onClick="launchBankModal({{$id}});" data-target=".modalBank">View Banking Details</a>')
                            ->make(true);


    }

    public function sponsored_list()
    {


        $sponsored_users = \DB::table('users_registrations')
                            ->join('contacts','contacts.user_id','=','users_registrations.sponsor_user_id')  
                            ->join('users','users.id','=','users_registrations.sponsored_user_id')
                            ->join('user_registration_statuses','user_registration_statuses.id','=','users.user_registration_statuses_id')
                            ->where('users_registrations.sponsor_user_id','=',\Auth::user()->id)
                           
                            ->select(
                                \DB::raw(
                                    "
                                    `users`.id,
                                    `users`.username,
                                    `users`.first_name,
                                    `users`.last_name,
                                    `users`.email,
                                    `users`.referred_by_id,
                                    `contacts`.`primary_contact`,
                                    `users_registrations`.`amount_due`,
                                    `users_registrations`.`paid`,
                                    `users_registrations`.`id` as 'reg',
                                    `user_registration_statuses`.`description`
                                     
                                    "

                            )
                            );
        return Datatables::of($sponsored_users)
                            ->addColumn('actions','
                                                  @if($description == "Pending activation" && $paid == 0)
                                                    <a href="confirm-registration-fees/{{ $username }}/{{ $reg }}" class="btn btn-success m-r-5 m-b-5 active">
                                                        Confirm Payment
                                                    </a>
                                                  @endif
                                                ')
                            ->make(true);




    }

    public function confirm_payment($username,$reg) {


        $user_registration                   = UserRegistration::where('id',$reg)->first();
        $user_registration->paid             = 1;
        $user_registration->save();

        
        $user                                = User::where('username',$username)->first();

        //Check if other sponsors have confirmed payments and activate the user
        $registrations                      = UserRegistration::where('sponsored_user_id',$user->id)->get();
        $amount_paid                        = 0;
        foreach ($registrations as $registration) {
            
            if($registration->paid == 1) {

                $amount_paid += $registration->amount_due;
            }

        }

        if ($amount_paid == 500) {

            $user->user_registration_statuses_id = 3;
            $user->save();

        }

    
       
        //SMS NEED TO BE SEND


        return redirect('home');



    }


  
     
}
