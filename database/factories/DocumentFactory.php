<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {

    return [
        'subject' => $faker->word,
        'number' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'user_id' => $faker->randomDigitNotNull,
        'file_name' => $faker->word,
        'label' => $faker->word,
        'improvable' => $faker->word
    ];
});
