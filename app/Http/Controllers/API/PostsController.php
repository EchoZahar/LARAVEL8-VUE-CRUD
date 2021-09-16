<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        return Post::with('categories:id,name')
            ->with('author:id,name')
            ->select('id', 'title', 'slug', 'short_description', 'author', 'editor', 'created_at', 'updated_at')
            ->where('published', 1)->latest()->paginate(15);
    }
}
