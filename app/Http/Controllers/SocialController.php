<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::all();
        return view('back.social.index', compact('socials'));
    }

    public function create()
    {
        return view('back.social.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
            'link' => 'required',
            'target' => 'required',
            'icon' => 'required'
        ]);

        $social = new Social();
        $social->label = $request->label;
        $social->link = $request->link;
        $social->target = $request->target;
        $social->icon = $request->icon;
        $social->save();

        return redirect()->route('social.index')->with('success', 'Social item added successfully');
    }

    public function edit($id)
    {
        $social = Social::where('id', $id)->firstOrFail();
        return view('back.social.edit', compact('social'));
    }

    public function update(Request $request, $id)
    {
        $social = Social::where('id', $id)->firstOrFail();
        $request->validate([
            'label' => 'required',
            'link' => 'required',
            'target' => 'required',
            'icon' => 'required'
        ]);

        $social->label = $request->label;
        $social->link = $request->link;
        $social->target = $request->target;
        $social->icon = $request->icon;
        $social->save();

        return redirect()->route('social.index')->with('success', 'Social item updated successfully');
    }

    public function delete(Request $request)
    {
        $social = Social::where('id', $request->id)->firstOrFail();
        $social->delete();
    }
}
