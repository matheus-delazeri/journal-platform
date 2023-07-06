<?php

namespace App\Http\Middleware;

use App\Models\Timeline;
use Illuminate\Http\Request;

class RedirectTimelineUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function handle(Request $request)
    {
        $timeline = Timeline::where("url_key", "=", $request->url_key)->firstOrFail();
        return response(view("front.page.timeline.show")->with('timeline', $timeline));
    }
}
