<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Advert;
use Faker\Generator as Faker;

$factory->define(Advert::class, function (Faker $faker) {
    return [
        'title' => $faker->text(15),
        'desc' => $faker->text(15),
        'link' => $faker->text(15),
        'image' => $faker->text(15),

    ];
});
