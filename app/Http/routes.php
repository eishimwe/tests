<?php



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\UserRegistration;



Route::auth();


Route::get('login',function() {

	if (\Auth::check()) {

        $number_of_sponsors_users  = UserRegistration::where('sponsored_user_id',\Auth::user()->id)->count();
        $number_of_sponsored_users = UserRegistration::where('sponsor_user_id',\Auth::user()->id)->count();
        return view('home.home',compact('number_of_sponsored_users','number_of_sponsors_users'));

	
	}
    

	return view('auth.login');

});




Route::get('/', function () {


	return view('welcome');
    
});


// This is a shortcut for the below authantication controllers


Route::get('/sponsor/{username}',['Middleware' => 'auth','uses' => 'UsersController@getuserlandingpage']);


/*// Authentication Routes...
$this->get('login', 'Auth\AuthController@showLoginForm');
$this->post('login', 'Auth\AuthController@login');
$this->get('logout', 'Auth\AuthController@logout');

// Registration Routes...
$this->get('register', 'Auth\AuthController@showRegistrationForm');
$this->post('register', 'Auth\AuthController@register');

// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');*/



/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
| 
*/

Route::get('/home', 'HomeController@index');


/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
|
| 
*/

Route::get('list-users', ['Middleware' => 'auth', function() {

	return view('users.list');
}]);

Route::get('users-list',['Middleware' => 'auth','uses' => 'UsersController@index']);



/*
|--------------------------------------------------------------------------
| Sponsors Routes
|--------------------------------------------------------------------------
|
| 
*/

Route::get('sponsors-list/{user_id}',['Middleware' => 'auth','uses' => 'SponsorsController@sponsors_list']);

Route::get('sponsored-list/{user_id}',['Middleware' => 'auth','uses' => 'SponsorsController@sponsored_list']);

Route::get('confirm-registration-fees/{username}/{reg}',['Middleware' => 'auth','uses' => 'SponsorsController@confirm_payment']);


/*
|---------------------s-----------------------------------------------------
| Banking Details Routes
|--------------------------------------------------------------------------
|
| 
*/

Route::get('banking-details',['Middleware' => 'auth.basic','uses' => 'BankAccountsController@index']);

Route::get('banking-list',['Middleware' => 'auth','uses' => 'BankAccountsController@banking_list']);

Route::get('add-bank',['Middleware' => 'auth','uses' => 'BankAccountsController@add_form']);

Route::post('save_bank',['Middleware' => 'auth','uses' => 'BankAccountsController@save_bank']);

Route::get('delete_bank/{id}',['Middleware' => 'auth','uses' => 'BankAccountsController@delete_bank']);

Route::get('sponsors-banking-list/{id}',['Middleware' => 'auth','uses' => 'BankAccountsController@sponsors_banking_list']);


/*
|---------------------s-----------------------------------------------------
| DONATIONS Routes
|--------------------------------------------------------------------------
|
| 
*/


Route::get('donations-details',['Middleware' => 'cors','uses' => 'DonationsController@index']);
Route::get('donations-list',['Middleware' => 'cors','uses' => 'DonationsController@donations_list']);
Route::get('add-donation',['Middleware' => 'cors','uses' => 'DonationsController@add_donation']);
Route::post('save_donation',['Middleware' => 'cors','uses' => 'DonationsController@save_donation']);
Route::get('all-donations',['Middleware' => 'cors','uses' => 'DonationsController@all_donations']);
Route::get('confirm-donor-payment/{id}',['Middleware' => 'cors','uses' => 'DonationsController@confirm_donor_payment']);



/*
|---------------------s-----------------------------------------------------
| TRANSACTIONS Routes
|--------------------------------------------------------------------------
|
| 
*/


Route::get('add-to-payout-queue/{username}/{reg}',['Middleware' => 'cors','uses' => 'TransactionsController@add_to_payout_queue']);
Route::get('transactions-list',['Middleware' => 'cors','uses' => 'TransactionsController@transactions_list']);
Route::post('save_transaction_payout_amount',['Middleware' => 'cors','uses' => 'TransactionsController@save_transaction_payout_amount']);
Route::get('start-transaction-payout/{transaction_id}',['Middleware' => 'cors','uses' => 'TransactionsController@start_transaction_payout']);
Route::get('gifts-list/{user_id}',['Middleware' => 'cors','uses' => 'TransactionsController@gifts_list']);
Route::get('my-donations-list/{user_id}',['Middleware' => 'cors','uses' => 'TransactionsController@my_donations_list']);
Route::get('start-transaction',['Middleware' => 'cors','uses' => 'TransactionsController@start_transaction']);






















