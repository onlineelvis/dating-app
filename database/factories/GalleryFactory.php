<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Gallery::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,50),
        'name' => 'https://picsum.photos/200/300'
    ];
});
