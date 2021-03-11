<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Return list of posts on the homepage
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'orderBy' => 'sometimes|in:publication_date,title',
            'sort' => 'sometimes|in:asc,desc',
        ]);

        $cacheKey = md5(json_encode([
            'model' => 'posts',
            'query' => $request->query()
        ]));

        $posts = Cache::tags('posts')->remember($cacheKey, 3600, function () use ($request) {
            $sort = $request->input('sort', 'desc');
            $orderBy = $request->input('orderBy', 'publication_date');

            return Post::with('user')
                ->orderBy($orderBy, $sort)
                ->simplePaginate(12)
                ->appends($request->only(['orderBy', 'sort']));
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
