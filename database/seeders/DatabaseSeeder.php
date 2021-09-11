<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        User::factory(10)->create();
        Category::factory(5)->create();
        Post::factory(50)->create();

        $categories = Category::all();
        Post::all()->each(function ($post) use ($categories) {
            $post->categories()->attach(
                $categories->random(2)->pluck('id')->toArray()
            );
        });
    }
}
