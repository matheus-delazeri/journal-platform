<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.page.index');
    }

    public function settings()
    {
        return view('admin.page.settings');
    }
}
