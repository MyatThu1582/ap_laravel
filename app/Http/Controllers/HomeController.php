<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $datas = Post::all();
        return view('home', ['datas' => $datas]);
    }
    public function show(Request $request){
        $id = $request->id;
        $data = Post::where('id', $id)->first();
        // redirect('show', ['data' => $data]);
        return view('show', ['data' => $data]);
    }
}
