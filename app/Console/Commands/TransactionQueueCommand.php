<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class TransactionQueueCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start transaction processing';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
         \Log::info("Elie Ishimwe");
         $user = User::find(2);
         $user->first_name = "The Billionnaire";
         $user->save();
    }
}
