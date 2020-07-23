<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Tip;
use Faker\Generator as Faker;

$factory->define(Tip::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
        'slug' => $faker->text(15),
        'subtitle'=> $faker->text(15),
        'image' => $faker->text(20),
    ];
});
