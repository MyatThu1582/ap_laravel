<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePostRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HomeController extends Controller
{
    protected $redirectTo = '/posts';
    /**
     * Display a listing of the resource.
     */

     public function testroot(){
        dd('This is the home page');
     }
     public function index()
    {
        $id = auth()->id();
        $datas = Post::where('id', $id)->orderBy('id', 'desc')->get();
        return view("home", compact("datas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view("create", compact("categories"));
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
        // Authorizing the update action based on the 'PostPolicy'
        Gate::authorize('update', $post); // Manually authorize access
        
        return view("show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update', $post); // Manually authorize access
        // $data = Post::findOrFail( $id);
        $categories = Category::orderBy('id', 'desc')->get();
        return view('edit', compact('post', 'categories'));
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
