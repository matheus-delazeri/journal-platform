<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Support\Facades\View;

class TimelineController extends Controller
{
    public function show($id) : \Illuminate\Contracts\View\View
    {
        $timeline = Timeline::find($id);

        return View::make('front.page.timeline.show')->with('timeline', $timeline);
    }
}
