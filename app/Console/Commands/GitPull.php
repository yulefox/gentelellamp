<?php

namespace App\Console\Commands;

use App;
use Illuminate\Console\Command;
use Log;

class GitPull extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lamp:git-pull
    { --b|branch= : 指定分支/标签的名称 }
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '更新指定分支到最新提交';

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
        $options = $this->option();
        $opts = "";

        foreach ($options as $key => $value) {
            $opts .= ' --' . $key . '=' . $value;
        }
        if ($options['branch'] != '') {
            $cmd = 'envoy run git-pull --branch=' . $options['branch'];
            Log::info($cmd);
            exec($cmd);
        }
    }
}
