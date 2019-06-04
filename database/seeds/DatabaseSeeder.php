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
        factory('App\User', 3)->create()->each(function ($user) {
            factory('App\Post', rand(1, 5))->create(['author_id' => $user->id]);
        });
    }
}
