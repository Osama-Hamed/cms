<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Post::class, function (Faker $faker) {
    $faker->addProvider(new Bluemmb\Faker\PicsumPhotosProvider($faker));

    return [
        'author_id' => factory('App\User'),
        'category_id' => factory('App\Category'),
        'title' => $title = $faker->sentence(rand(8, 12)),
        'slug' => str_replace(' ', '-', $title),
        'excerpt' => $faker->text(rand(250, 300)),
        'body' => $faker->paragraphs(rand(10, 15), true),
        'image' => mt_rand(0, 1) == 1 ? 'demo.png' : null,
        'created_at' => $date = Carbon::now()->subDays(mt_rand(0, 10)),
        'updated_at' => $date,
        'published_at' => mt_rand(0, 1) == 0 ? null : (clone $date)->addDays(mt_rand(0, 5))
    ];
});
