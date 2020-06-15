<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TypeDocument;
use Faker\Generator as Faker;

$factory->define(TypeDocument::class, function (Faker $faker) {

    return [
        'description' => $faker->word,
        'libelle' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
