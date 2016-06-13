<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Sponsor;

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
        $number_of_sponsored_users = Sponsor::where('sponsor_user_id',\Auth::user()->id)->count();
        return view('home.home',compact('number_of_sponsored_users'));
    }
}
