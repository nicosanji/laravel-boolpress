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
        $category = $request->query("category");
        // $postList = Post::all();

        $postList = Post::with('category')->with('user')->with('tags');

        if ($category) {
            $postList = $postList->where("category_id", $category);
        }

        $postList = $postList->paginate(4);

        sleep(2);

        return response()->json($postList);
    }

    public function show($id)
    {
        $post = Post::where("id", $id)->with('category')->with('user')->with('tags')->first();

        return response()->json($post);
    }
}
