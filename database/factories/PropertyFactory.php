<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'type' => $faker->word,
        'address' => $faker->address,
        'price' => $faker->randomFloat(2, 0, 15),
        'summary' => $faker->paragraph,
        'image1' => $faker->imageUrl,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
