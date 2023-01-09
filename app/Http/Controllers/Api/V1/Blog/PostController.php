<?php

namespace App\Http\Controllers\Api\V1\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Blog\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderby('id', 'DESC')->paginate(2);

        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }
}
