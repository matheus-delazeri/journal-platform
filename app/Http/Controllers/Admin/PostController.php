<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    public function grid()
    {
        return view('admin.page.post.grid');
    }

    public function create()
    {
        return view('admin.page.post.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        $post = new Post($request->all());
        if ($post->save()) {
            return redirect()->route('admin.post.grid')->with("success", "Post successfully saved!");
        }

        return back()->withErrors([
            'title' => 'Unable to save post'
        ])->onlyInput('title');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return View::make('admin.page.post.edit')
            ->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::find($id);
        if ($post->update($request->all())) {
            return redirect()->back()->with("success", "Post successfully saved!");
        }

        return back()->withErrors([
            'title' => 'Unable to save post'
        ])->onlyInput('title');

    }

    public function show($id)
    {
        $post = Post::find($id);

        return View::make('front.page.post.show')->with('post', $post);
    }
}
