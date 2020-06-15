<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Soutenance;
use Faker\Generator as Faker;

$factory->define(Soutenance::class, function (Faker $faker) {

    return [
        'theme' => $faker->word,
        'user_id' => $faker->word,
        'annee_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
