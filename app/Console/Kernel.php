<?php

namespace App\Console;

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
        Commands\Inspire::class,
        Commands\StuffEntrust::class,
        Commands\UpdateServers::class,
        Commands\VersionLog::class,
        Commands\GitPull::class,
        Commands\GenerateProtobuf::class,
        Commands\MakeServers::class,
        Commands\ReleasePackage::class,
        Commands\UploadPackage::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
            ->hourly();
        // 每 5 分钟获取一次版本配置
        $schedule->command('lamp:version-log')
            ->everyFiveMinutes();
    }
}
