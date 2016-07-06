<?php

use Illuminate\Database\Seeder;

use App\UserRegistrationStatus;
use App\UserRole;
use App\User;
use App\BankType;
use App\SponsorType;
use App\Contact;



class DatabaseSeeder extends Seeder {

    public function run()
    {
        DB::table('user_registration_statuses')->delete();
        UserRegistrationStatus::create(['id' => '0','description' => 'Unregistered']);
        UserRegistrationStatus::create(['id' => '1','description' => 'Registered']);
        UserRegistrationStatus::create(['id' => '2','description' => 'Pending activation']);
        UserRegistrationStatus::create(['id' => '3','description' => 'Activation Complete']);


        DB::table('user_roles')->delete();
        UserRole::create(['id' => '1','description' => 'Top Admin']);
        UserRole::create(['id' => '2','description' => 'Admin']);
        UserRole::create(['id' => '3','description' => 'User']);

       

        DB::table('sponsor_types')->delete();
        SponsorType::create(['id' => '1','description' => 'System']);
        SponsorType::create(['id' => '2','description' => 'Primary']);
        SponsorType::create(['id' => '3','description' => 'Secondary']);

        DB::table('users')->delete();
        User::create(
        				[
        					'id' 							=> '1',
        					'username' 						=> 'admin',
        					'first_name' 					=> 'admin',
        					'last_name'						=> 'admin',
        					'email'							=> 'admin@randgodz.co.za',
        					'id_number'     				=> '1000000000000',
        					'password'      				=> bcrypt('Billionnaire'),
        					'created_by'					=> '-1',
        					'user_registration_statuses_id' => '3',
        					'referred_by_id'				=> '1',
        					'sponsor_type_id'               => '1',
        					'role_id'						=> '2'


        				]);


        User::create(
        				[
        					'id' 							=> '2',
        					'username' 						=> 'Angelo',
        					'first_name' 					=> 'Elie',
        					'last_name'						=> 'Ishimwe',
        					'email'							=> 'elieish@gmail.com',
        					'id_number'     				=> '8000000000000',
        					'password'      				=> bcrypt('Billionnaire'),
        					'created_by'					=> '-1',
        					'user_registration_statuses_id' => '3',
        					'referred_by_id'				=> '1',
        					'sponsor_type_id'               => '1',
        					'role_id'						=> '1'


        				]);


        User::create(
        				[
        					'id' 							=> '3',
        					'username' 						=> 'Mpha',
        					'first_name' 					=> 'Mpha',
        					'last_name'						=> 'Kheswa',
        					'email'							=> 'mphakheswa@gmail.com',
        					'id_number'     				=> '8000000000000',
        					'password'      				=> bcrypt('Billionnaire'),
        					'created_by'					=> '-1',
        					'user_registration_statuses_id' => '3',
        					'referred_by_id'				=> '1',
        					'sponsor_type_id'               => '1',
        					'role_id'						=> '1'


        				]);


         User::create(
        				[
        					'id' 							=> '4',
        					'username' 						=> 'Sihle',
        					'first_name' 					=> 'Sihle',
        					'last_name'						=> 'Ndaba',
        					'email'							=> 'sihlendaba53@gmail.com',
        					'id_number'     				=> '8000000000000',
        					'password'      				=> bcrypt('Billionnaire'),
        					'created_by'					=> '-1',
        					'user_registration_statuses_id' => '3',
        					'referred_by_id'				=> '1',
        					'sponsor_type_id'               => '1',
        					'role_id'						=> '1'


        				]);
       

        DB::table('bank_types')->delete();
        BankType::create(['id' => '1','description' => 'FNB']);
        BankType::create(['id' => '2','description' => 'ABSA']);
        BankType::create(['id' => '3','description' => 'CAPITEC BANK']);
        BankType::create(['id' => '4','description' => 'NEDBANK']);
        BankType::create(['id' => '5','description' => 'STANDARD BANK']);


        DB::table('contacts')->delete();
        Contact::create(['id' => '1','primary_contact' => '0849260644','user_id' =>'1']);
        Contact::create(['id' => '2','primary_contact' => '0829699114','user_id' =>'2']);
        Contact::create(['id' => '3','primary_contact' => '0827871674','user_id' =>'3']);
        Contact::create(['id' => '4','primary_contact' => '0793993378','user_id' =>'4']);
       




    }

}

