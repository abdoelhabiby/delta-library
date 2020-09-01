<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservation:check-permitted-period';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The period allowed for receiving the book';

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
     * @return int
     */
    public function handle()
    {

         $reservations = Reservation::where("active","=",1)
                                    ->where("receive_in","=" , null)
                                    ->where("retrieved_in", "=", null)
                                    ->where("created_at", "<", Carbon::now()->subHours(72))
                                    ->get();



        if($reservations->count() > 0){
            foreach ($reservations as  $reservation) {

                 $reservation->update(["active" => 0]);
                 $reservation->book()->update(['active' => 1]);
            }
        }




        return true;
    }
}
