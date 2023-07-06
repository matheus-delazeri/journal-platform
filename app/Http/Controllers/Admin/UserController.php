<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function update(Request $request)
    {
        $parsedData = array_filter($request->all('locale'));
        if (Auth::user()->update($parsedData)) {
            return redirect()->back()->with("success", __("User successfully updated!"));
        }

        return back()->withErrors([__('Unable to update user')]);

    }
}
