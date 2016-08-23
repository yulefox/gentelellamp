<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Version::truncate();

        Model::unguard();

        $this->call(EntrustSeeder::class);
        $this->call(VersionsTableSeeder::class);

        Model::reguard();
    }
}
