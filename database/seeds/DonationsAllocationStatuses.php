<?php

use Illuminate\Database\Seeder;
use App\DonationStatus;

class DonationsAllocationStatuses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('donations_allocation_statuses')->delete();
        DonationStatus::create(['id' => '1','description' => 'allocated']);
        DonationStatus::create(['id' => '2','description' => 'cancelled']);
        DonationStatus::create(['id' => '3','description' => 'complete']);
      
      
    }
}
