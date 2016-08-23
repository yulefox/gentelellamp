<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class VersionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 30) as $index) {
            App\Version::create([
                'version' => $faker->regexify('[1-3]\.[1-9][0-9]{0,1}\.[1-9][0-9]{0,1}'),
                'mode' => $faker->randomElement(['bt', 'release', 'thai', 'dev']),
                'deprecated' => $faker->boolean(30),
                'remark' => $faker->sentence(10),
            ]);
        }
    }
}
