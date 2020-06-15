<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Professeur;
use Faker\Generator as Faker;

$factory->define(Professeur::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'email' => $faker->word,
        'email_verified_at' => $faker->date('Y-m-d H:i:s'),
        'password' => $faker->word,
        'remember_token' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'date_naissance' => $faker->word,
        'lieu_naissance' => $faker->word,
        'genre' => $faker->word,
        'contact' => $faker->word,
        'role_id' => $faker->randomDigitNotNull,
        'matricule' => $faker->word
    ];
});
