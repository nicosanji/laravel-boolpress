<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index()
    {
        // $postList = Post::all();
        $postList = Post::with('category')->with('user')->get();

        return response()->json($postList);
    }
}
