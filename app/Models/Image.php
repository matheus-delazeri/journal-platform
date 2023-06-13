<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Image extends Model
{
    public static function upload(Request $request) : string
    {
        $url = asset("media/placeholder.png");
        if ($request->has('file')) {
            $originName = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('file')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
        }

        return $url;
    }

    public static function unlink($image) : bool
    {
        if (File::exists($image)) {
            return File::delete($image);
        }

        return false;
    }
}
