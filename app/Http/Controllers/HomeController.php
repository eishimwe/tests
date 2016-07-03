<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\UserRegistration;
use App\Transaction;
use App\Donation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        

        $number_of_sponsors_users  = UserRegistration::where('sponsored_user_id',\Auth::user()->id)->count();
        $number_of_sponsored_users = UserRegistration::where('sponsor_user_id',\Auth::user()->id)->count();
        $number_of_transactions    = Transaction::count();
      
        $number_of_gifts           = \DB::table('donations_allocation')
                                       
                                        ->where('receiver_id','=',\Auth::user()->id)->count();


        $number_of_my_donations    = \DB::table('donations_allocation')
                                       
                                        ->where('donor_id','=',\Auth::user()->id)->count();

        $number_of_donations       = Donation::count();

                                       

        return view('home.home',compact('number_of_sponsored_users','number_of_sponsors_users','number_of_transactions','number_of_gifts','number_of_donations','number_of_my_donations'));
    }
}
