<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Payment::class, function (Faker $faker) {
    return [
        'owner_id' => User::where('role', 'employee')->get()->random()->id,
        'payment_method' => $faker->randomElement($array = ['Credit Card', 'Cash']),
        'amount_due' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 10000),
        'currency' => $faker->randomElement($array = ['Hryvnia', 'Dollar', 'Euro']),
        'description' => $faker->text($maxNbChars = 500),
    ];
});
