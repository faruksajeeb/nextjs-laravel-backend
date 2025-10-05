<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // list
    public function index()
    {
        return Post::orderBy('created_at', 'desc')->get();
    }

    // store
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',
        ]);

        $post = Post::create($data);
        return response()->json($post, 201);
    }

    // show
    public function show(Post $post)
    {
        return $post;
    }

    // update
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',
        ]);

        $post->update($data);
        return response()->json($post);
    }

    // delete
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }
}
