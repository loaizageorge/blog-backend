<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PostResource::collection(Post::with('comments')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;
        return Post::create($validated);
    }

    /**
     * Display the specified resource.
     * @param Post $post
     * @return PostResource
     */
    public function show(Post $post)
    {
        $post->load('comments');
        return new PostResource($post);
    }


    /**
     * Update the specified resource in storage.
     * Only the post creator should be allowed to update the post
     * @param StorePostRequest $request
     * @param Post $post
     * @return PostResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        if ($post->user_id !== Auth::user()->id) {
            return response(['errors' => 'Forbidden'], 403);
        }

        $validated = $request->validated();
        $post->update($validated);
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     * Only the post creator should be allowed to delete the post
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::user()->id) {
            return response(['errors' => 'Forbidden'], 403);
        }
        $post->delete();

        // nothing to return here
        return response()->noContent();
    }
}
