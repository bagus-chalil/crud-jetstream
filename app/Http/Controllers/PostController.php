<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all post data
        $posts = Post::latest()->paginate(7);

        // render view
        return view('users.posts.index', [
            'posts' => SpladeTable::for($posts)
            ->column('name')
            ->column('keterangan')
            ->column('photo')
            ->column('action')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // render view
        return view('users.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        // validate request
        $this->validate($request, [
            'photo'     => 'required|image|mimes:jpeg,jpg,png',
            'name'     => 'required|min:5',
            'keterangan'   => 'required|min:10'
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        // insert new post to db
        Post::create([
            'name' => $request->name,
            'keterangan' => $request->keterangan,
            'photo' => $image->hashName(),
        ]);

        // render view
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
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
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
