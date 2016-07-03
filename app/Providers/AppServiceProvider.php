<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\BankType;
use App\BankAccount;
use App\User;
use App\Auth;
use App\Donation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(\Schema::hasTable('bank_types')) {
            
            $bank_types           = BankType::orderBy('description','ASC')->get();
            $select_bank_types    = array();
            $select_bank_types[0] = 'Select Bank';

            foreach ($bank_types as $bank_type) {

                $select_bank_types[$bank_type->id] = $bank_type->description;
                
            }



            \View::share('selectBankTypes',$select_bank_types);

        }

        view()->composer('master', function($view)
        {
            $number_bank_accounts = BankAccount::where('user_id',\Auth::user()->id)->count();
            $number_donations     = Donation::where('user_id',\Auth::user()->id)->count();
            $view->with('number_bank_accounts', $number_bank_accounts)->with('number_donations',$number_donations);
        });

      
        
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
