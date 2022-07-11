<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
        if (($tags->isEmpty())){
            return redirect()->route('admin.tag.store');
        }
        return view('admin.tag.index', compact('tags'));
    }
}
