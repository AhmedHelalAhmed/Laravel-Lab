<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Resources\PostResource;

class PostsController extends Controller
{
    public function index()
    {
        $posts=Post::paginate(2);
        return PostResource::collection($posts);

    }



}
