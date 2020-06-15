<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Preinscription;
use Faker\Generator as Faker;

$factory->define(Preinscription::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'contact' => $faker->word,
        'email' => $faker->word,
        'module_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
