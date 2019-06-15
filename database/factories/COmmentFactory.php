<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => factory('App\Post'),
        'body' => $faker->text,
        'author_name' => $faker->name,
        'author_email' => $faker->email,
        'author_url' => $faker->domainName
    ];
});
