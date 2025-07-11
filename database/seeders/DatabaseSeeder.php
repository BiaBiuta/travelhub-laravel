<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Department;
use App\Models\User;
use App\Models\Posts;
use App\Models\Share;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $departments = Department::factory(5)->create();
        $users = User::factory(20)
            ->for($departments->random())  // Alege un departament la întâmplare pentru fiecare user
            ->create();
        $posts = Posts::factory(20)->for($users->random())  // Alege un departament la întâmplare pentru fiecare user
            ->create();
        // Comment::factory(20)->for($users->random())->for($posts->random())->create();
        $allUsers = User::all();
        $allPosts = Posts::all();

        // Shuffle collections to ensure randomness
        $shuffledUsers = $allUsers->shuffle();
        $shuffledPosts = $allPosts->shuffle();

        // Ensure each comment has a unique user and post
        $comments = Comment::factory(20)->make(); // Create Comment instances without saving

        $comments->each(function ($comment, $index) use ($shuffledUsers, $shuffledPosts) {
            $comment->user_id = $shuffledUsers->get($index)->id; // Assign unique user
            $comment->posts_id = $shuffledPosts->get($index)->id; // Assign unique post
            $comment->save(); // Save each comment with assigned user and post
        });
        $shares = Share::factory(5)->make();
        $shares->each(function ($shares, $index) use ($shuffledUsers, $shuffledPosts) {
            $shares->user_id = $shuffledUsers->get($index)->id;
            $shares->posts_id = $shuffledPosts->get($index)->id;
            $shares->save();
        });
    }
}
