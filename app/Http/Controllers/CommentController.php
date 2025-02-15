<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to comment to a post.');
        }

        Comment::create([
            'body' => trim($request->comment),
            'post_id' => $post->id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts.show', $post->id);
    }
}
