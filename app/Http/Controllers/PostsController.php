<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\StorePostRequest;
// use Illuminate\Support\Facades\Request;

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


    public function store(StorePostRequest $request)
    {
        // dd($request->all());

        Post::create($request->all());
        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'user_id' => $request->user_id,
        // ]);
        return redirect(route('posts.index'));
    }
    public function show($id)
    {
        // $post = DB::table(‘posts’)->find($id);
        $post = Post::findOrFail($id);
        // dd($post);
        // return view('user.profile', ['user' => User::findOrFail($id)]);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $users = User::all();
        $post = Post::findOrFail($id);
        return view('posts.edit', [
            'post' => $post,
            'users' => $users,

        ]);
    }

    public function update($id, Request $request)
    {
        // try{

        // }catch (ModelNotFoundException $e ) {

        // }
        $post = Post::findOrFail($id);
    
        // $post->update([
        //     'title' => $request->title,

        // ]) 
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
        $post->save();
        return redirect(route('posts.index'));
    }

    public function destroy($id, Request $request)
    {
        Post::destroy($id);
        return back();
    }

}
