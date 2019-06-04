<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'author_id' => factory('App\User'),
        'title' => $title = $faker->sentence(rand(8, 12)),
        'slug' => str_replace(' ', '-', $title),
        'excerpt' => $faker->text(rand(250, 300)),
        'body' => $faker->paragraphs(rand(10, 15), true),
        'image' => rand(0, 1) == 1 ? $faker->imageUrl(800, 450) : null,
    ];
});
