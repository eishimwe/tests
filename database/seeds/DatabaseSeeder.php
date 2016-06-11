<?php

use Illuminate\Database\Seeder;

use App\UserRegistrationStatus;
class DatabaseSeeder extends Seeder {

    public function run()
    {
        DB::table('user_registration_statuses')->delete();
        UserRegistrationStatus::create(['id' => '0','description' => 'Unregistered']);
        UserRegistrationStatus::create(['id' => '1','description' => 'Registered']);
        UserRegistrationStatus::create(['id' => '2','description' => 'Pending activation']);
        UserRegistrationStatus::create(['id' => '3','description' => 'Activation Complete']);



    }

}