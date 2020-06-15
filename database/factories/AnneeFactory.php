<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Annee;
use Faker\Generator as Faker;

$factory->define(Annee::class, function (Faker $faker) {

    return [
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'debut' => $faker->randomDigitNotNull,
        'fin' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
