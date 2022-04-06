<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index(){
        $posts=Post::all();
        return view('posts.index',compact('posts'));
    }

    public function show(Post $post){

        return view('blog-post',compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        $input=request()->validate([
            'title' => 'required | min: 5',
            'body' => 'required'
        ]);

        if(request('image')){
            $input['post_image']=request('image')->store('images/post');
        }

        User::find(Auth::user()->id)->posts()->create($input);

        return back();

    }



}
