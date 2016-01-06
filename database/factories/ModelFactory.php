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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => 'secret',
        'remember_token' => str_random(10),
        'phone' => $faker->phoneNumber,
        'birthday' => $faker->date('mm/dd/Y'),
        'place_of_birth' => $faker->sentences(1, true),
        'status' => rand(0, 1),
        'position_id' => rand(1, 5),
        'department_id' => rand(1, 5),
    ];
});

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentences(2, true),
    ];
});

$factory->define(App\Models\Position::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentences(2, true),
    ];
});