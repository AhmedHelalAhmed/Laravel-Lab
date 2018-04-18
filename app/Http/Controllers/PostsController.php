<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;


use Response;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }


    public function store(StorePostRequest $request)
    {

        Post::create($request->only('title', 'description', 'user_id'));

        return redirect(route('posts.index'));
    }

    public function show($id)
    {
        try {
            $post = Post::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return Response::view('errors.404');
        }

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

    public function update($id, UpdatePostRequest $request)
    {

        try {
            $post = Post::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return Response::view('errors.404');
        }
        $post->update($request->all());

        return redirect(route('posts.index'));
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return back();
    }

}
