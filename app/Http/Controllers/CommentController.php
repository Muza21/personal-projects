<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request, Post $post)
    {
        $validated = $request->validated();

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to comment to a post.');
        }

        Comment::create([
            'body' => trim($validated['comment']),
            'post_id' => $post->id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id != Auth::id()) {
            return redirect()->route('posts.show', $comment->post)->with('error', 'You do not have permission to delete this comment.');
        }
        $comment->delete();
        return redirect()->route('posts.show', $comment->post)->with('success', 'Comment deleted successfully');
    }
}
