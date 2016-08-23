<?php

namespace App\Console\Commands;

use App\Host;
use App\Server;
use DB;
use Illuminate\Console\Command;

class UpdateServers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lamp:update-servers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        echo exec('bash ' . env('SHELL_PATH') . 'update-servers.sh');
        $apps = DB::table('cfg_app_base')->orderby('idx')->get();
        foreach ($apps as $app) {
            $host = Host::where('wan_ip', $app->wan_ip)->first();
            $server = Server::where('id', $app->idx)->first();
            if ($host == null) {
                $host = new Host;
                $host->id = $app->idx;
                $host->name = $app->name;
                $host->lan_ip = $app->lan_ip;
                $host->wan_ip = $app->wan_ip;
                $host->save();
                $this->info(json_encode($host, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            }
            if ($server == null) {
                $server = new Server;
                $server->id = $app->idx;
                $this->info($host);
                $server->name = $app->name;
                $server->display_name = $app->brief;
                $server->host_id = $host->id;
                $server->port = $app->port;
                $server->version = $app->version;
                $server->platform = $app->platform;
                $server->save();
                $this->info(json_encode($server, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            }
        }
    }
}
