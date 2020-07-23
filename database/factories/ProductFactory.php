<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;


$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'image' => $faker->text(15),
        'desc' => $faker->text(40),
        'user_id' => $faker->randomNumber($nbDigits = 2),
        'price' => $faker->randomNumber($nbDigits = 4),
        'status' => $faker->text(6),
    ];
});
