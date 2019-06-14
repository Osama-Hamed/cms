<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = factory('App\Tag', 7)->create();

        factory('App\User', 5)->create()->each(function ($user) use ($tags) {
            factory('App\Category', 2)->create()->each(function ($category) use ($user, $tags) {
                factory('App\Post', rand(1, 3))->create(['author_id' => $user->id, 'category_id' => $category->id])->each(function ($post) use ($tags) {
                    for ($i = 0; $i < rand(1, count($tags)); $i++) {
                        $post->tags()->attach($tags[$i]);
                    }
                });
            });
        });
    }
}
