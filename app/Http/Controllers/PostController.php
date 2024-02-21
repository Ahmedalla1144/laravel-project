<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::with('post_status')->with('user')->get();
    }

    public function pending()
    {
        $pending = Post::with('post_status')
            ->with('user')
            ->get();

        return $pending;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // $post = Post::with('user')
        //     ->with('post_status')
        //     ->with('comments.user')
        //     ->with('reactions.user')
        //     ->with('reactions.reaction_type')
        //     ->get()
        //     ->where('id', '=', $post->id)
        //     ->first();

        // OR
        $post = Post::with([
            'user',
            'post_status',
            'comments.user',
            'reactions.user',
            'reactions.reaction_type'
        ])
            ->where('id', '=', $post->id)
            ->first();

        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        return $post->delete();
    }
}


class Human {

}
 