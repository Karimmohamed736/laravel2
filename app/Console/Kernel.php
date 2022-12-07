<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    //link the command file
    protected $commands=[\App\Console\Commands\Expiration::class];

    // the task scheduler
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('user:expire')->everyMinute();  //update 0 to 1 in database expire column every 1  
        
        $schedule->command('notify:email')->daily();   
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
