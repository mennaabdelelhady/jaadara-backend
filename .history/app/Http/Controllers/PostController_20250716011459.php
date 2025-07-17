<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = auth()->user()->posts()->paginate(10);
        //return response()->json($posts);
        return new PostResource($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|string'
        ]);

        $post = auth()->user()->posts()->create($request->all());
        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = auth()->user()->posts()->find($id);
        if (!$post)
            return response()->json(['message' => 'Post not found'], 404);
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = auth()->user()->posts()->find($id);
        if (!$post)
            return response()->json(['message' => 'Post not found'], 404);

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'body' => 'sometimes|required|string',
            'image' => 'nullable|string'
        ]);

        $post->update($request->all());
        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = auth()->user()->posts()->find($id);
        if (!$post)
            return response()->json(['message' => 'Post not found'], 404);
        $post->delete();
        return response()->json(['message' => 'Post deleted']);
    }
}
