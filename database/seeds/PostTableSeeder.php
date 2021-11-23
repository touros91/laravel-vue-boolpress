<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use Illuminate\Support\Str;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++) {
            $newPost = new Post();
            $newPost->title = $faker->words(5, true);
            $newPost->content = $faker->text(500);
            $newPost->slug = Str::of($newPost->title)->slug('-');
            $newPost->save();
        }
    }
}
