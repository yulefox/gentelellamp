<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
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
            App\Player::create([
                'id' => $faker->regexify('[1-3]\.[1-9][0-9]{0,1}\.[1-9][0-9]{0,1}'),
                'sid' => $faker->randomElement(['bt', 'release', 'thai', 'dev']),
                'name' => $faker->sentence(10),
                'user' => $faker->sentence(10),
            ]);
        }
    }
}
