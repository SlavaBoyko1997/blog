<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::all();
        if (($posts->isEmpty())){
            return redirect()->route('admin.post.store');
        }
        return view('admin.post.index', compact('posts'));
    }
}
