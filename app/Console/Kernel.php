<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\User;
use App\TransactionPayout;
use App\Transaction;
use App\DonationAllocation;
use App\UserTransaction;
use App\Donation;



class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
       


        $schedule->call(function () {



            $payouts = \DB::table('transactions_payouts')
                                ->select(
                                \DB::raw(
                                    "
                                     `transactions_payouts`.created_at,
                                     `transactions_payouts`.id,
                                     `transactions_payouts`.payout_amount,
                                     `transactions_payouts`.transaction_id                                   
                                   
                                    "

                            )
                            )->orderBy('created_at','asc')
                            ->get();


            $donations = \DB::table('donations')
                                ->where('is_valid','=',1)
                                ->select(
                                \DB::raw(
                                    "
                                     `donations`.created_at,
                                     `donations`.id,
                                     `donations`.donation_amount,
                                     `donations`.user_id                                   
                                   
                                    "

                            )
                            )
                            ->orderBy('created_at','asc')
                            ->get();

            //dd($donations);


            foreach ($payouts as $payout) {


                $transaction_payout_amount = $payout->payout_amount;      
                $user_transaction          = UserTransaction::where('transaction_id',$payout->transaction_id)->first();//R500


                if (sizeof($donations) > 0) {


                    foreach ($donations as $donation) {


                        if($donation->donation_amount <= $transaction_payout_amount ) {


                            $donation_allocation                    = new DonationAllocation();
                            $donation_allocation->donor_id          = $donation->user_id;
                            $donation_allocation->receiver_id       = $user_transaction->user_id;
                            $donation_allocation->donation_amount   = $donation->donation_amount;
                            $donation_allocation->save();
                            $transaction_payout_amount              = $transaction_payout_amount - $donation->donation_amount;

                            
                            $objPayout                              = TransactionPayout::find($payout->id);
                            $objPayout->payout_amount               = $transaction_payout_amount; 
                            $objPayout->save();


                            $objDonation                              = Donation::find($donation->id);
                            $objDonation->is_valid                    = 0; 
                            $objDonation->save();


                        } else {

                             
                            
                             $amount_to_donate                       =  $donation->donation_amount - $transaction_payout_amount;

                             $donation_allocation                    = new DonationAllocation();
                             $donation_allocation->donor_id          = $donation->user_id;
                             $donation_allocation->receiver_id       = $user_transaction->user_id;
                             $donation_allocation->donation_amount   = $amount_to_donate
                             $donation_allocation->save();

                             $transaction_payout_amount              = $transaction_payout_amount - $amount_to_donate;

                             $objPayout                              = TransactionPayout::find($payout->id);
                             $objPayout->payout_amount               = $transaction_payout_amount;
                             $objPayout->save();


                             //$objDonation                              = Donation::find($donation->id);
                             //$objDonation->is_valid                    = 0; 
                             //$objDonation->save();




                        }

                        if ($transaction_payout_amount <= 0) {


                             $transaction = Transaction::find($payout->transaction_id);
                             $transaction->transaction_type_id = 3; 
                             $transaction->save();
                             break;
                             




                        } else {


                            $transaction = Transaction::find($payout->transaction_id);
                            $transaction->transaction_type_id = 2; 
                            $transaction->save();




                        }



                        
                    
                    }


                }
                else {


                    $transaction = Transaction::find($payout->transaction_id);
                    $transaction->transaction_type_id = 2; 
                    $transaction->save();
                    

                }

                

            }
            

           



        });
    }
}
