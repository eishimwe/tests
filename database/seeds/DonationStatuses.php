<?php

use Illuminate\Database\Seeder;
use App\DonationStatus;

class DonationStatuses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('donations_statuses')->delete();
        DonationStatus::create(['id' => '1','description' => 'available']);
        DonationStatus::create(['id' => '2','description' => 'complete']);
        DonationStatus::create(['id' => '3','description' => 'cancelled']);
     
    }
}
