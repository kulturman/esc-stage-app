<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Depot;
use Faker\Generator as Faker;

$factory->define(Depot::class, function (Faker $faker) {

    return [
        'stage_id' => $faker->randomDigitNotNull,
        'path' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
