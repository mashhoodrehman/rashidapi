<?php

namespace App\Console;

use App\Helpers\PushNotificationHelper;
use App\Models\Appointment;
use Carbon\Carbon;
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
        //
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
            $appointments = Appointment::whereRaw('scheduled_on = DATE_ADD(now(), INTERVAL 48 HOUR)')->get();
            foreach ($appointments as $appointment) {
                PushNotificationHelper::send($appointment->user->fcm_registration_id,
                    'Appointment Reminder', 'You have an upcoming appointment on  ' . $appointment->scheduled_on->toDayDateTimeString(), []);
            }
        })->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
