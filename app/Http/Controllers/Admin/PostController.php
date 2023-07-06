<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
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
        return view('admin.page.post.edit');
    }

    public function store(Request $request)
    {
        $parsedData = $this->parseDataFromRequest($request);

        $post = new Post($parsedData);
        if ($post->save()) {
            return redirect()->route('admin.post.edit', ['id' => $post->id])
                ->with("success", __("Post successfully saved!"));
        }

        return back()->withErrors([
            'title' => __('Unable to save post')
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
        $post = Post::find($id);
        $parsedData = $this->parseDataFromRequest($request);
        if ($post->update($parsedData)) {
            return redirect()->back()->with("success", __("Post successfully saved!"));
        }

        return back()->withErrors([
            'title' => __('Unable to save post')
        ])->onlyInput('title');

    }

    protected function parseDataFromRequest(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'short_content' => 'required',
            'content' => 'required',
            'date' => 'required',
            'file' => 'image'
        ]);

        $parsedData = array_filter($request->all());
        if (isset($parsedData["file"])) {
            $imageLocation = Image::upload($request);
            $parsedData["image"] = $imageLocation;
        }


        return $parsedData;

    }

    public function deleteImage($id)
    {
        $post = Post::find($id);
        Image::unlink($post->image);
        $post->update(["image" => asset("media/placeholder.png")]);
        return View::make('admin.page.post.edit')
            ->with('post', $post);
    }
}
