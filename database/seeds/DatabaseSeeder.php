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
            factory('App\Post', rand(3, 5))->create(['author_id' => $user->id]);
        });
    }
}
