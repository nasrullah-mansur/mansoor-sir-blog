<?php

namespace App\Http\Controllers;

use App\Models\BlogSidebar;
use Illuminate\Http\Request;

class BlogSidebarController extends Controller
{
    public function index()
    {
        $cta = BlogSidebar::first();
        return view('back.sections.blog_sidebar.create', compact('cta'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg',
            'content' => 'required',
            'btn_text' => 'required',
            'btn_link' => 'required'
        ]);

        $exist = BlogSidebar::first();
        $cta = new BlogSidebar();

        if ($exist) {
            $cta = $exist;
            $cta->image = ImageUpload($request->image, CTA_PATH, $exist->image);
        } else {
            $cta->image = ImageUpload($request->image, CTA_PATH);
        }

        $cta->content = $request->content;
        $cta->btn_text = $request->btn_text;
        $cta->btn_link = $request->btn_link;
        $cta->save();

        return redirect()->route('blog.sidebar')->with('success', 'Blog sidebar CTA updated successfully');
    }
}
