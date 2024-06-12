<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function __construct(private Posts $postModel)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = new $this->postModel([
            'content' => $request->content
        ]);

        $request->user()->posts()->save($post);

        return redirect(route("blog", ["id" => $request->user()->id]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        //
    }

    public function update_page(Request $request, string $id)
    {
        $post = Posts::find($id);
        if (!$post) {
            return back();
        }

        if ($request->user()->id != $post->user->id) {
            return back();
        } else {
            return view("post-update", ["post" => $post]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Posts $posts)
    {
        $posts->update([
            "content" => $request->content,
            "updated_at" => time()
        ]);

        return redirect(route("blog",  ["id" => $request->user()->id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        $posts->delete();

        return back();
    }
}
