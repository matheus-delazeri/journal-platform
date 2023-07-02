<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Illuminate\Http\Request;

class RedirectPostUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function handle(Request $request)
    {
        $post = Post::where("url_key", "=", $request->url_key)->firstOrFail();
        return response(view("front.page.post.show")->with('post', $post));
    }
}
