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
        factory('App\User', 5)->create()->each(function ($user) {
            factory('App\Category', 2)->create()->each(function ($category) use ($user) {
                factory('App\Post', rand(1, 3))->create(['author_id' => $user->id, 'category_id' => $category->id]);
            });
        });
    }
}
