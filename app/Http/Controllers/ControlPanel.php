<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;

class ControlPanel extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('control_panel.root');
    }

    public function showBlogInfo()
    {
        return view('control_panel.blog_info');
    }

    public function updateBlogInfo(Request $request)
    {
        $options = $request->only([
            'blog_name',
        ]);

        foreach ($options as $key => $value) {
            Option::set($key, $value);
        }

        return redirect()->back();
    }
}
