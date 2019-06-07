<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $name = mt_rand(0, 1) == 0 ? $faker->word : $faker->sentence(2),
        'slug' => str_replace(' ', '-', $name)
    ];
});
