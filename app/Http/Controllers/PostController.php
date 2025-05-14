<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    // Display all posts
    public function index()
    {
        $posts = Post::paginate(10); 
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(PostRequest $request)
    {
        Post::create($request->validated());
        return redirect()->route('posts.index')->with('success', 'Post added successfully!');
    }
   
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->validated());
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
