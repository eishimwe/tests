<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Contact;
use App\Sponsor;
use App\UserRegistration;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username'      => 'required|max:255|unique:users',
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $enums = \Config::get('registrationstatusesenums');
        $pending_user_status = $enums['users_registration_statuses']['pendingactivation'];

        $user = new User();
        $user->first_name = $data['first_name'];
        $user->last_name  = $data['last_name'];
        $user->username   = $data['username'];
        $user->email      = $data['email'];
        $user->role_id    = 2;
        $user->password   = bcrypt($data['password']);
        $user->user_registration_statuses_id = $pending_user_status;

        $contact = new Contact();
        $contact->primary_contact = $data['cellphone'];

        




         
       \DB::transaction(function () use ($user, $contact,$data) {

            if (isset($data['sponsor_username'])) {

                 $secondary_sponsor     = User::where('username',$data['sponsor_username'])->first();
            }
            else {

                 $secondary_sponsor     = User::where('username','admin')->first();

            }

           
            $user->referred_by_id  = $secondary_sponsor->id;
            $user->sponsor_type_id = $secondary_sponsor->sponsor_type_id;
            $user->save();
            $contact->user_id = $user->id;
            $contact->save();


            if (isset($data['sponsor_username'])) {

                
                $primary_sponsor    = User::find($secondary_sponsor->referred_by_id);
                $system_sponsor     = User::where('username','admin')->first();

                if ($primary_sponsor->username == 'admin') {


                    $user_registration                    = new UserRegistration();
                    $user_registration->sponsor_user_id   = $primary_sponsor->id;
                    $user_registration->sponsor_type_id   = 2;
                    $user_registration->sponsored_user_id = $user->id;
                    $user_registration->amount_due        = '300';
                    $user_registration->save();
                    
                    $user_registration                    = new UserRegistration();
                    $user_registration->sponsor_user_id   = $secondary_sponsor->id;
                    $user_registration->sponsor_type_id   = 3;
                    $user_registration->sponsored_user_id = $user->id;
                    $user_registration->amount_due        = '200';
                    $user_registration->save();




                }else {


                    $user_registration                    = new UserRegistration();
                    $user_registration->sponsor_user_id   = $system_sponsor->id;
                    $user_registration->sponsor_type_id   = 1;
                    $user_registration->sponsored_user_id = $user->id;
                    $user_registration->amount_due        = '100';
                    $user_registration->save();
                    
                    $user_registration                    = new UserRegistration();
                    $user_registration->sponsor_user_id   = $primary_sponsor->id;
                    $user_registration->sponsor_type_id   = 2;
                    $user_registration->sponsored_user_id = $user->id;
                    $user_registration->amount_due        = '200';
                    $user_registration->save();
                    
                    $user_registration                    = new UserRegistration();
                    $user_registration->sponsor_user_id   = $secondary_sponsor->id;
                    $user_registration->sponsor_type_id   = 3;
                    $user_registration->sponsored_user_id = $user->id;
                    $user_registration->amount_due        = '200';
                    $user_registration->save();





                }
                
               
     
     
     
               
            } else {

                $system_sponsor                       = User::where('username','admin')->first();   
                $user_registration                    = new UserRegistration();
                $user_registration->sponsor_user_id   = $system_sponsor->id;
                $user_registration->sponsor_type_id   = 1;
                $user_registration->sponsored_user_id = $user->id;
                $user_registration->amount_due        = '500';
                $user_registration->save();

            }

            

        });

        return $user;  

    }

  
}
