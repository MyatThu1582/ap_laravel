<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePostRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Test;
use App\Mail\PostCreated;
use App\Notifications\PostNotification;
use App\Events\PostCreatedEvent;

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
        // $posts = Post::pluck('title');
        // dd($posts);
        
        //Mail Testing
        // Mail::raw('Hello World', function($msg){
        //    $msg->to('neo@gmail.com')->subject('AP Test Mail'); 
        // });

        //Notification
        // $user = User::find(1);
        // $user->notify(new PostNotification());
        // Notification::send(, new PostNotification());
       
        $id = auth()->id();
        $datas = Post::where('user_id', $id)->orderBy('id', 'desc')->get();
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
        $credentials['user_id'] = auth()->id();
        $post = Post::create($credentials);
        PostCreatedEvent::dispatch($post);
        return redirect('/posts')->with('status', config('aprogrammar.message.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, Test $test)
    {
        // Authorizing the update action based on the 'PostPolicy'
        Gate::authorize('view', $post); // Manually authorize access
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
        $credentials = $request->validated();
        $crefentials['user_id'] = auth()->id();
        $post->update($credentials);
        // Post::Where('id', $post->id)->Update($credentials);

        // Mail::to('myatthu1582.ygn@gmail.com')->send(new PostEdited($post));
        return redirect('/posts')->with('status', 'Post Updated successfully!');
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
