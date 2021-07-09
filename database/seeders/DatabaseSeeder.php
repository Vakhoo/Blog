<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            "name" => "John Doe"
        ]);
        $category = Category::factory()->create([
            "name" => "first category"
        ]);
        Post::factory(5)->create([
            "user_id" => $user->id
        ]);
        Post::factory(2)->create([
            "user_id" => $user->id,
            "category_id" => $category->id
        ]);
        Post::factory(2)->create([
            "category_id" => $category->id
        ]);
        $category = Category::factory()->create([
            "name" => "second category"
        ]);
        Post::factory(2)->create([
            "category_id" => $category->id
        ]);

        Post::factory(3)->create();
    }
}
