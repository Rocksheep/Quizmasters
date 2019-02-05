<?php

use Faker\Generator as Faker;

$factory->define(\App\Room::class, function (Faker $faker) {
    return [
        'quiz_id' => factory(App\Quiz::class)->create()->id,
        'join_code' => $faker->lexify('??????')
    ];
});
