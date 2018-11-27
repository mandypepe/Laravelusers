<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

/*
 *  $factory->define(BuenasNuevas\User::class, function (Faker $faker) {
    return [
        'profession_id' => Profession::inRandomOrder()->value('id'),
        'gender' => $faker->randomElement(['male', 'female']),
        'first_name' => function (array $user) {
            return $faker->firstName($user['gender']);
        },
        'second_name' => function (array $user) {
            return $faker->firstName($user['gender']);
        }
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'),

        'remember_token' => str_random(10),
        'phone' => $faker->phoneNumber,
        'kind' => $faker->randomElement(['administrator', 'operator', 'guest']),
    ];
});

 */
