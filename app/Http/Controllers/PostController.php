<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostStoreRequest $request)
    {
        $validated = $request->validated();
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to create a post.');
        }
        Post::create([
            'title' => trim($validated['title']),
            'content' => trim($validated['content']),
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $validated = $request->validated();
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $post->update([
            'title' => trim($validated['title']),
            'content' => trim($validated['content']),
        ]);

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();

        return redirect()->route('posts.index');
    }
}
