<?php

namespace Database\Seeders;
use App\Models\Article;
use App\Models\Comment;



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
        // \App\Models\User::factory(10)->create();
         \App\Models\Article::factory(10)->create();
         \App\Models\Comment::factory(20)->create();
         \App\Models\User::factory()->create([
            "name"=>"Bob",
            "email"=>"bob@gmail.com"
        ]);
        \App\Models\User::factory()->create([
            "name"=>"Alice",
            "email"=>"alice@gmail.com"
        ]);



    }

}
