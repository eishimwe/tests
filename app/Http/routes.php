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



Route::get('/', function () {
    
	return view('welcome');
    //return view('auth.login');
});

// This is a shortcut for the below authantication controllers
Route::auth();

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

Route::get('sponsors-list',['Middleware' => 'auth','uses' => 'SponsorsController@sponsors_list']);

Route::get('sponsored-list',['Middleware' => 'auth','uses' => 'SponsorsController@sponsored_list']);

Route::get('confirm-registration-fees/{username}/{reg}',['Middleware' => 'auth','uses' => 'SponsorsController@confirm_payment']);


/*
|---------------------s-----------------------------------------------------
| Banking Details Routes
|--------------------------------------------------------------------------
|
| 
*/

Route::get('banking-details',['Middleware' => 'auth','uses' => 'BankAccountsController@index']);

Route::get('banking-list',['Middleware' => 'auth','uses' => 'BankAccountsController@banking_list']);

Route::get('add-bank',['Middleware' => 'auth','uses' => 'BankAccountsController@add_form']);

Route::post('save_bank',['Middleware' => 'auth','uses' => 'BankAccountsController@save_bank']);

Route::get('delete_bank/{id}',['Middleware' => 'auth','uses' => 'BankAccountsController@delete_bank']);

Route::get('sponsors-banking-list/{id}',['Middleware' => 'auth','uses' => 'BankAccountsController@sponsors_banking_list']);












