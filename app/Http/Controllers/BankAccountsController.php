<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\BankAccount;

class BankAccountsController extends Controller
{
    
    public function bank_accounts_list(){


    	return view('banks.list');


    }
}
