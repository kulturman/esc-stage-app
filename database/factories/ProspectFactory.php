<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Prospect;
use Faker\Generator as Faker;

$factory->define(Prospect::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'contact' => $faker->word,
        'adresse' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
