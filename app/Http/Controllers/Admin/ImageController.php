<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        return response()->json(['location' => Image::upload($request)]);
    }
}
