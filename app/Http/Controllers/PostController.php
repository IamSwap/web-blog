<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\PostFiltersRequest;

class PostController extends Controller
{
    /**
     * Return list of posts on the homepage
     *
     * @param \App\Http\Requests\PostFiltersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(PostFiltersRequest $request)
    {
        $cacheKey = md5(json_encode([
            'model' => 'posts',
            'query' => $request->query()
        ]));

        $posts = Cache::tags('posts')->remember($cacheKey, 3600, function () use ($request) {
            $filters = $request->only(['orderBy', 'sort']);

            return Post::with('user')
                ->filterBy($filters)
                ->simplePaginate(12)
                ->appends($filters);
        });

        return view('home', [
            'posts' => $posts
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post->load('user')
        ]);
    }
}
