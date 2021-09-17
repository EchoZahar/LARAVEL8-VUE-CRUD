<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostsController extends Controller
{
    public function posts()
    {
        return Post::with('categories:id,name,slug')
            ->with('author:id,name,email')
            ->with('editor:id,name,email')
            ->where('published', 1)
            ->latest()
            ->paginate(10);
    }
}
