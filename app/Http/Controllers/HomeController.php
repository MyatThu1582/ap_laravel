<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function testroot(){
        dd('This is the home page');
     }
     public function index()
    {
        $datas = Post::orderBy('id', 'desc')->get();
        return view("home", compact("datas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storePostRequest $request)
    {
        $credentials = $request->validated();

        Post::create($credentials);
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // $data = Post::findOrFail( $id);
        return view("show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // $data = Post::findOrFail( $id);
        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(storePostRequest $request, Post $post)
    {
        // $id = $request->id();
        $credentials = $request->validated();

        $post->update($credentials);
        // Post::Where('id', $post->id)->Update($credentials);
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}
