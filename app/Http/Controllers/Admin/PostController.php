<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.pages.blog.index', [
            'posts' => Post::where('title', 'like', '%' . \request()->get('query') . '%')->orderby('id', 'DESC')->paginate(10)
        ]);
    }

    public function create($id)
    {
        return view('admin.pages.blog.create', [
            'id' => $id
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin.pages.blog.edit', [
            'post' => $post
        ]);
    }


    public function update(Request $request, Post $post)
    {
        $post->fill($request->all());
        $post->saveOrFail();

        return redirect(route('admin.blog.post.index'));
    }

    public function store(Request $request, $id)
    {
        $post = new Post();

        $post->id = $id;
        $post->fill($request->all());
        $post->created_by = auth('admin')->user()->id;
        $post->saveOrFail();

        return redirect(route('admin.blog.post.index'));
    }

    public function storeImage(Request $request)
    {
        $image = $request->file('file');
        $image->store('blogs/posts', 'public');

        $url = Storage::disk('public')->url('blogs/posts/' . $image->hashName());

        return response()->json(['link' => $url]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }
}
