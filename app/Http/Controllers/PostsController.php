<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index()
    {
        // dd("hello from posts");
        // return Post::all();
        $posts = Post::all();
        // dd($posts);
        /**
         * posts the key can be access from the view
         * $posts just variable contain array comes from database
         */

        /**
         * posts.index
         * posts is the directory in resources/views
         * call method index
         */
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }


    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);
        return redirect(route('posts.index'));
    }



}
