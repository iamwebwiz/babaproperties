<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Interest;
use Faker\Generator as Faker;

$factory->define(Interest::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'property_id' => factory(App\Property::class)->create()->id,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
