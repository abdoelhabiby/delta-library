<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Reservation;
use App\Console\Commands\TestCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\TestCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

         //$schedule->command('reservation:check-permitted-period')->daily();

        $schedule->call(function () {



            $reservations = Reservation::where("active", "=", 1)
                ->where("receive_in", "=", null)
                ->where("retrieved_in", "=", null)
                ->where("created_at", "<", Carbon::now()->subHours(72))
                ->get();



            if ($reservations->count() > 0) {
                foreach ($reservations as  $reservation) {

                    $reservation->update(["active" => 0]);
                    $reservation->book()->update(['active' => 1]);
                }
            }



            return true;
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
