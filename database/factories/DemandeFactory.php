<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Demande;
use Faker\Generator as Faker;

$factory->define(Demande::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'adresse' => $faker->word,
        'ifu' => $faker->word,
        'ville' => $faker->word,
        'telephone' => $faker->word,
        'email' => $faker->word,
        'numero_demande' => $faker->word,
        'validee' => $faker->word,
        'demande_type_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'transaction_id' => $faker->word,
        'rejection_cause' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
