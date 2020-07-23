<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;
use App\Qualification;

$factory->define(Qualification::class, function (Faker $faker) {
    return [
        'desc' => $faker->text(40),
        'job_id' => $faker->randomNumber($nbDigits = 2),
    ];
});
