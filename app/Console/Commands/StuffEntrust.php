<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class StuffEntrust extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'entrust:stuff';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stuff entrust tables';

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
        /*
        $viewDashboard = new Permission();
        $viewDashboard->name = 'view-dashboard';
        $viewDashboard->display_name = '游客';
        $viewDashboard->description = '基本什么都不能做';
        $viewDashboard->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = '管理员';
        $admin->description = '管理用户和分配权限';
        $admin->save();

        $guest = new Role();
        $guest->name = 'guest';
        $guest->display_name = '游客';
        $guest->description = '基本什么都不能做';
        $guest->save();

         */
        $adminUser = new User();
        $adminUser->name = 'amdin';
        $adminUser->email = 'admin@admin.com';
        $adminUser->password = Hash::make('admin');
        $adminUser->save();
    }
}
