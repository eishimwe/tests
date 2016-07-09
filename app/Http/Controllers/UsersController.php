<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Contact;

use Yajra\Datatables\Facades\Datatables;

use Clickatell\Api\ClickatellHttp;


class UsersController extends Controller
{
    
    public function index()
    {
        
        $users = \DB::table('users')
                            ->join('contacts','contacts.user_id','=','users.id')
                            ->join('user_registration_statuses','user_registration_statuses.id','=','users.user_registration_statuses_id')
        					->select(
        						\DB::raw(
        							"
        							 `users`.id,
        							 `users`.username,
        							 `users`.first_name,
        							 `users`.last_name,
									 `users`.email,
									 `user_registration_statuses`.description,
                                     `contacts`.primary_contact as cellphone

        							"

        							)
        					);

        return Datatables::of($users)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateAffiliationModal({{$id}});" data-target=".modalEditAffiliation"><i class="fa fa-fw m-r-10 pull-left f-s-18 fa-edit"></i></a>')
                            ->make(true);

    }


     public function getuserlandingpage($referral_id) {

        $enums = \Config::get('registrationstatusesenums');
        $activated_user_status = $enums['users_registration_statuses']['activated'];
        $result = User::where('username','=',$referral_id)
                        ->where('user_registration_statuses_id','=',$activated_user_status)->first();


        if ($result) {

            $referrer_names      = $result->first_name. '  '.$result->last_name;
            $referrer_username   = $result->username;

            return view('auth.register',compact('referrer_names','referrer_username'));
        }
        else {

            return view('auth.login');
        }



    }

    public function send_sms() {


            $contacts         = Contact::whereIn('user_id',array(2,3,4))->get();
            $contacts_numbers = array();

            foreach ($contacts as $contact) {

              
                $contacts_numbers[] = $contact->primary_contact;

        
            }

           
            $username = "billndaba";
            $password = "RTICGJZaVGOeCL";
            $apiID    = "3607315";


            $clickatell = new ClickatellHttp($username, $password, $apiID); 
            $response   = $clickatell->sendMessage($contacts_numbers, "I love you too much.Elie");
     
            foreach ($response as $message) { 
                
                echo $message->id."<br>";
                echo $message->destination."<br>";
                echo $message->error."<br>";
                echo $message->errorCode."<br>";
                

            }
     
   

    }



}
