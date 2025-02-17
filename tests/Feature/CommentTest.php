<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_comment_on_post()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@test.ge',
            'password' => bcrypt('1234'),
        ]);

        $post = Post::factory()->create();

        $this->actingAs($user);

        $response = $this->post("/posts/{$post->id}/comments", [
            'body' => 'This is a comment.'
        ]);

        $response->assertRedirect(route('posts.show', $post->id));
    }

    public function test_user_can_see_comments_on_post()
    {
        $post = Post::factory()->create();
        $comment = Comment::factory()->create(['post_id' => $post->id]);

        $response = $this->get("/posts/{$post->id}");

        $response->assertStatus(200);
        $response->assertSee($comment->content);
    }

    public function test_user_can_delete_their_comment()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();
        $comment = Comment::factory()->create(['post_id' => $post->id, 'user_id' => $user->id]);
        $this->actingAs($user);

        $response = $this->delete("/comments/{$comment->id}");

        $response->assertRedirect("/posts/{$post->id}");
        $this->assertDatabaseMissing('comments', [
            'id' => $comment->id,
        ]);
    }
}
