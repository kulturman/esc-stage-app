<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Stage;
use Faker\Generator as Faker;

$factory->define(Stage::class, function (Faker $faker) {

    return [
        'etudiant_id' => $faker->randomDigitNotNull,
        'prof_suivi_id' => $faker->randomDigitNotNull,
        'annee_id' => $faker->randomDigitNotNull,
        'filiere_id' => $faker->randomDigitNotNull,
        'phase' => $faker->randomDigitNotNull,
        'directeur_memoire_id' => $faker->randomDigitNotNull,
        'maitre_de_stage' => $faker->word,
        'niveau' => $faker->word,
        'date_debut' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
