<?php

namespace App\Http\Controllers\Api;

use App\Category;
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

    public function show($id)
    {
        $post = Post::where("id", $id)->with('category')->with('user')->with('tags')->first();

        return response()->json($post);
    }
}
