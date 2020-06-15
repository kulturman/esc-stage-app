<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TypeDemande;
use Faker\Generator as Faker;

$factory->define(TypeDemande::class, function (Faker $faker) {

    return [
        'libelle' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'libelle_court' => $faker->word,
        'description' => $faker->text,
        'slug' => $faker->word,
        'structure_id' => $faker->randomDigitNotNull,
        'cout' => $faker->randomDigitNotNull,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'delai_de_traitement' => $faker->randomDigitNotNull,
        'signature' => $faker->word,
        'responsable' => $faker->word
    ];
});
