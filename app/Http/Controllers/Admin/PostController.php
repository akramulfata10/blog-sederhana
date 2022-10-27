<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->get();
        return view('layouts.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('layouts.posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        $post = Post::create($request->validated());
        if ($post) {
            if ($request->hasFile('image')) {
                $post->addMediaFromRequest('image')->toMediaCollection('images');
            }
        }
        return redirect('admin/posts')->with('message', 'add posts successfully');
    }

    public function show(Post $post)
    {
        return view('layouts.posts.show', [
            'post' => $post,
        ]);

    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('layouts.posts.edit', [
            'post' => $post,
        ]);

    }

    public function update(CreatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        if ($post) {
            if ($request->hasFile('image')) {
                $post->clearMediaCollection('images');
                $post->addMediaFromRequest('image')->toMediaCollection('images');
            }
        }
        return redirect('admin/posts')->with('message', 'update posts successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('admin/posts')->with('message', 'delete posts successfully');

    }
}
