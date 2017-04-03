<?php

namespace Agrosellers\Console;

use Agrosellers\Console\Commands\Pays;
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
        \Agrosellers\Console\Commands\Inspire::class,
        Pays::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('pay:zonapagos')
                 ->everyFiveMinutes();
    }
}
