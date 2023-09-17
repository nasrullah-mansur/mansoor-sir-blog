<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function edit()
    {
        $banner = Banner::first();
        return view('back.sections.banner', compact('banner'));
    }

    public function update(Request $request)
    {
        $banner = Banner::first();

        if (!$banner) {
            $request->validate([
                'image' => 'required|mimes:png,jpg',
                'title' => 'required',
                'content' => 'required',
                'btn_label' => 'required',
                'btn_link' => 'required'
            ], [
                'title.required' => 'Name field is required',
                'content.required' => 'Description field is required'
            ]);

            $banner = new Banner();
            $banner->image = ImageUpload($request->image, BANNER_PATH);
        } else {
            $request->validate([
                'image' => 'nullable|mimes:png,jpg',
                'title' => 'required',
                'content' => 'required',
                'btn_label' => 'required',
                'btn_link' => 'required'
            ], [
                'title.required' => 'Name field is required',
                'content.required' => 'Description field is required'
            ]);
            if ($request->hasFile('image')) {
                $banner->image = ImageUpload($request->image, BANNER_PATH);
            }
        }

        $banner->title = $request->title;
        $banner->content = $request->content;
        $banner->btn_label = $request->btn_label;
        $banner->btn_link = $request->btn_link;


        $banner->save();

        return redirect()->route('banner.edit')->with('success', 'Banner section updated successfully');
    }
}
