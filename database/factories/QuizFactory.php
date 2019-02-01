<?php

use App\Quiz;
use Faker\Generator as Faker;

$factory->define(Quiz::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'join_code' => $faker->lexify('??????')
    ];
});
