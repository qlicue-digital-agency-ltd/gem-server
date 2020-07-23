<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(JOB::class, function (Faker $faker) {
    $unixTimestamp = '1461067200';
    return [
        'company_id' => $faker->randomNumber($nbDigits = 2),
        'title' => $faker->text(15),
        'code' => $faker->text(10),
        'desc' => $faker->text(50),
        'deadline' => $faker->dateTime($unixTimestamp),

    ];
});
