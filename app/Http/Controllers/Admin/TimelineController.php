<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TimelineController extends Controller
{
    public function grid()
    {
        return view('admin.page.timeline.grid');
    }

    public function create()
    {
        return view('admin.page.timeline.edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        $nonNullValues = array_filter($request->all());
        $timeline = new Timeline($nonNullValues);
        if ($timeline->save()) {
            return redirect()->route('admin.timeline.edit', ["id" => $timeline->id])
                ->with("success", __("Timeline successfully saved!"));
        }

        return back()->withErrors([
            'title' => __('Unable to save timeline')
        ])->onlyInput('title');
    }

    public function edit($id)
    {
        $timeline = Timeline::find($id);

        return View::make('admin.page.timeline.edit')
            ->with('timeline', $timeline);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $timeline = Timeline::find($id);
        if ($timeline->update($request->all())) {
            return redirect()->back()->with("success", __("Timeline successfully saved!"));
        }

        return back()->withErrors([
            'title' => __('Unable to save timeline')
        ])->onlyInput('title');

    }
}
