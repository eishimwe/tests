<?php

use Illuminate\Database\Seeder;
use App\DonationAllocationStatus;

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
        DonationAllocationStatus::create(['id' => '1','description' => 'allocated']);
        DonationAllocationStatus::create(['id' => '2','description' => 'cancelled']);
        DonationAllocationStatus::create(['id' => '3','description' => 'complete']);
      
      
    }
}
