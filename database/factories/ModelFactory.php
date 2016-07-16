<?php

use Carbon\Carbon;

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

$factory->define(Msenl\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'avatar' => 'https://lh6.googleusercontent.com/-MCxMwUnr1eA/AAAAAAAAAAI/AAAAAAAABlM/b3gzdohOTGI/photo.jpg?sz=50',
        'agent' => $faker->username,
        'level' => $faker->biasedNumberBetween(1, 16, 'sqrt'),
        'city' => $faker->city,
        'state' => 'MS',
        'postalcode' => $faker->postcode,
        'provider' => 'google',
        'provider_id' => $faker->isbn13,
        'verified' => 1,
        'verified_on' => Carbon::now(),
    ];
});

$factory->define(Msenl\Faq::class, function (Faker\Generator $faker) {
    return [
        'question' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'answer' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});

