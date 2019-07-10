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
                    for ($i = 0; $i < rand(1, count($tags)); $i++) $post->tags()->attach($tags[$i]);

                    if ($post->isPublished()) factory('App\Comment', rand(1, 5))->create(['post_id' => $post->id]);
                });
            });
        });

        $roles = [
            ['name' => 'admin', 'display_name' => 'Admin'],
            ['name' => 'editor', 'display_name' => 'Editor'],
            ['name' => 'author', 'display_name' => 'Author'],
        ];

        foreach ($roles as $role) {
            \App\Role::create($role);
        }

        \App\User::find(1)->attachRole('admin');
        \App\User::find(2)->attachRole('editor');
        \App\User::find(3)->attachRole('author');
        \App\User::find(4)->attachRole('author');
        \App\User::find(5)->attachRole('author');

        $permissions = ['crud-post', 'update-others-post', 'delete-others-post', 'crud-category', 'crud-user'];

        $savedPermissions = [];
        foreach ($permissions as $permission) {
            $savedPermissions[$permission] = \App\Permission::create(['name' => $permission]);
        }

        \App\Role::whereName('admin')->first()->attachPermissions([$savedPermissions['crud-post'], $savedPermissions['update-others-post'], $savedPermissions['delete-others-post'], $savedPermissions['crud-category'], $savedPermissions['crud-user']]);

        \App\Role::whereName('editor')->first()->attachPermissions([$savedPermissions['crud-post'], $savedPermissions['update-others-post'], $savedPermissions['delete-others-post'], $savedPermissions['crud-category']]);

        \App\Role::whereName('author')->first()->attachPermission($savedPermissions['crud-post']);
    }
}
