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
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'type' => array_rand(['vip', 'normal', 'public', 'admin'], 1),
        'image'=> 'avatar.png',
        'phone' => $faker->e164PhoneNumber,
        'business_role' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Speaker::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'description' => $faker->text($maxNbChars = 200),
    ];
});
