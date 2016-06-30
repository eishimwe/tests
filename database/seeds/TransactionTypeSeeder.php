<?php

use Illuminate\Database\Seeder;
use App\TransactionType;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions_types')->delete();
        TransactionType::create(['id' => '1','description' => 'Pending Payout']);
        TransactionType::create(['id' => '2','description' => 'Pending Donor Allocation']);
        TransactionType::create(['id' => '3','description' => 'Pending Payout Confirmation']);
        TransactionType::create(['id' => '4','description' => 'Pending Payment Confirmation']);
        TransactionType::create(['id' => '5','description' => 'Payment Confirmed']);
    }
}
