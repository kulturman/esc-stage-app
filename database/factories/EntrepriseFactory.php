<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Entreprise;
use Faker\Generator as Faker;

$factory->define(Entreprise::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'contact' => $faker->word,
        'adresse' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
