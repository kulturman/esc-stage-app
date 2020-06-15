<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Filiere;
use Faker\Generator as Faker;

$factory->define(Filiere::class, function (Faker $faker) {

    return [
        'nom_filiere' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
