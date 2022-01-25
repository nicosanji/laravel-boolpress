<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(Request $request)
    {
        // $postList = Post::all();
        $postList = Post::with('category')->with('user')->with('tags')->paginate(4);


        return response()->json($postList);
    }
}
