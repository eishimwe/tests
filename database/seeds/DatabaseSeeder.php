<?php

use Illuminate\Database\Seeder;

use App\UserRegistrationStatus;
use App\UserRole;
use App\User;
use App\BankType;
use App\SponsorType;
use App\Contact;
use App\DonationStatus;
use App\TransactionType;
use App\DonationAllocationStatus;



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
        					'email'							=> 'admin@admin.co.za',
        					'id_number'     				=> '1000000000000',
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


        DB::table('donations_statuses')->delete();
        DonationStatus::create(['id' => '1','description' => 'available']);
        DonationStatus::create(['id' => '2','description' => 'complete']);


        DB::table('transactions_types')->delete();
        TransactionType::create(['id' => '1','description' => 'Pending Payout']);
        TransactionType::create(['id' => '2','description' => 'Pending Donor Allocation']);
        TransactionType::create(['id' => '3','description' => 'Pending Payout Confirmation']);
        TransactionType::create(['id' => '4','description' => 'Pending Payment Confirmation']);
        TransactionType::create(['id' => '5','description' => 'Payment Confirmed']);


        DB::table('donations_allocation_statuses')->delete();
        DonationAllocationStatus::create(['id' => '1','description' => 'allocated']);
        DonationAllocationStatus::create(['id' => '2','description' => 'cancelled']);
        DonationAllocationStatus::create(['id' => '3','description' => 'complete']);


        DB::table('donations')->delete();
        DB::table('donations_allocation')->delete();
        DB::table('transactions')->delete();
        DB::table('users_transactions')->delete();
        DB::table('users_registrations')->delete();



    }

}

