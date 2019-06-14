<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->sentence(rand(1, 2)),
        'slug' => str_replace(' ', '', $name)
    ];
});
