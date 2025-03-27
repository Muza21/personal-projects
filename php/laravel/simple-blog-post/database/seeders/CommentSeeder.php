<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $posts = Post::all();

        if ($users->isEmpty() || $posts->isEmpty()) {
            $this->command->info('No users or posts found! Run `php artisan db:seed --class=UserSeeder` and `php artisan db:seed --class=PostSeeder` first.');
            return;
        }
        Comment::factory()->count(20)->make()->each(function ($comment) use ($users, $posts) {
            $comment->user_id = $users->random()->id;
            $comment->post_id = $posts->random()->id;
            $comment->save();
        });
        // Comment::factory()->count(10)->create([
        //     'user_id' => $users->random()->id,
        //     'post_id' => $posts->random()->id,
        // ]);
    }
}
