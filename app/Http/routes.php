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

Route::get('list-users', ['Middleware' => 'cors', function() {

	return view('users.list');
}]);

Route::get('users-list',['Middleware' => 'cors','uses' => 'UsersController@index']);



/*
|--------------------------------------------------------------------------
| Sponsors Routes
|--------------------------------------------------------------------------
|
| 
*/

Route::get('sponsors-list',['Middleware' => 'cors','uses' => 'SponsorsController@sponsors_list']);

Route::get('sponsored-list',['Middleware' => 'cors','uses' => 'SponsorsController@sponsored_list']);

Route::get('confirm-registration-fees/{username}/{reg}',['Middleware' => 'cors','uses' => 'SponsorsController@confirm_payment']);


/*
|---------------------s-----------------------------------------------------
| Banking Details Routes
|--------------------------------------------------------------------------
|
| 
*/

Route::get('banking-details',['Middleware' => 'cors','uses' => 'BankAccountsController@index']);

Route::get('banking-list',['Middleware' => 'cors','uses' => 'BankAccountsController@banking_list']);

Route::get('add-bank',['Middleware' => 'cors','uses' => 'BankAccountsController@add_form']);

Route::post('save_bank',['Middleware' => 'cors','uses' => 'BankAccountsController@save_bank']);

Route::get('delete_bank/{id}',['Middleware' => 'cors','uses' => 'BankAccountsController@delete_bank']);

Route::get('sponsors-banking-list/{id}',['Middleware' => 'cors','uses' => 'BankAccountsController@sponsors_banking_list']);


/*
|---------------------s-----------------------------------------------------
| DONATIONS Routes
|--------------------------------------------------------------------------
|
| 
*/


Route::get('donations-details',['Middleware' => 'cors','uses' => 'DonationsController@index']);
Route::get('donations-list',['Middleware' => 'cors','uses' => 'DonationsController@donations_list']);












