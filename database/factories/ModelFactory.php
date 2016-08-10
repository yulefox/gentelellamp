<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->userName,
        'display_name' => $faker->name,
        'description' => $faker->sentence(6),
    ];
});

$factory->define(App\Host::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->unique()->numberBetween(1000, 9999),
        'name' => $faker->unique()->name,
        'display_name' => $faker->name,
        'description' => $faker->sentence(6),
        'lan_ip' => $faker->unique()->localIpv4,
        'wan_ip' => $faker->unique()->ipv4,
    ];
});

$factory->define(App\Server::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->unique()->numberBetween(100000, 999999),
        'name' => $faker->unique()->name,
        'display_name' => $faker->name,
        'description' => $faker->sentence(6),
        'host_id' => $faker->numberBetween(1000, 9999),
        'port' => $faker->numberBetween(10000, 60000),
        'version' => $faker->randomElement(['1.0.0', '1.1.0', '1.2.0', '2.0.0']),
        'platform' => $faker->randomElement(['android', 'google', 'facebook']),
    ];
});
