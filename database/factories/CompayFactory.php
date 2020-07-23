<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Company;
use Faker\Generator as Faker;


$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->text(15),
        'address' => $faker->text(15),
        'logo' => $faker->text(15),
        'phone' => $faker->text(15),
        'email' => $faker->text(15),
    ];
});
