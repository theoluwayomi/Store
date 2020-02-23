<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shipping;
use Faker\Generator as Faker;

$factory->define(Shipping::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'companyname' => $faker->unique()->userName,
        'email' => $faker->safeEmail,
        'mobilenumber' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'postalcode' => $faker->postcode,
    ];
});
