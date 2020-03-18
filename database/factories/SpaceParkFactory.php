<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SpacePark;
use Faker\Generator as Faker;

$factory->define(SpacePark::class, function (Faker $faker) {
    return [
        'number' => mt_rand(10, 99),
        'status' => rand(0, 1),
        'trouble' => null,
        'group_id' => rand(1, 10),
    ];
});
