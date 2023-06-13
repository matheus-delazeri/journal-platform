<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    public function show($id) : \Illuminate\Contracts\View\View
    {
        $post = Post::find($id);

        return View::make('front.page.post.show')->with('post', $post);
    }
}
