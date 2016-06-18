<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;


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
        $number_of_sponsored_users = User::whereNotNull('referred_by_id')->where('referred_by_id',\Auth::user()->id)->count();
        $number_of_sponsors_users  = (\Auth::user()->username == 'RandGodz')? 0 : 1;

        return view('home.home',compact('number_of_sponsored_users','number_of_sponsors_users'));
    }
}
