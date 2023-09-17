<?php

namespace App\Http\Controllers;

use App\Models\Advertizement;
use Illuminate\Http\Request;

class AdvertizementController extends Controller
{
    public function index()
    {
        $adds = Advertizement::orderBy('created_at', 'DESC')->get();
        return view('back.sections.advertizement.index', compact('adds'));
    }

    public function create()
    {
        return view('back.sections.advertizement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg',
            'title' => 'required',
            'link' => 'required',
            'position' => 'required',
            'status' => 'required'
        ]);

        $add = new Advertizement();
        $add->image = ImageUpload($request->image, ADD_PATH);
        $add->title = $request->title;
        $add->status = $request->status;
        $add->link = $request->link;
        $add->position = $request->position;

        $add->save();

        return redirect()->route('advertizement.index')->with('success', 'Add added successfully');
    }

    public function edit($id)
    {
        $add = Advertizement::where('id', $id)->firstOrFail();
        return view('back.sections.advertizement.edit', compact('add'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|mimes:png,jpg',
            'title' => 'required',
            'link' => 'required',
            'status' => 'required',
            'position' => 'required'
        ]);

        $add = Advertizement::where('id', $id)->firstOrFail();
        if ($request->hasFile('image')) {
            $add->image = ImageUpload($request->image, ADD_PATH, $add->image);
        }
        $add->title = $request->title;
        $add->link = $request->link;
        $add->position = $request->position;
        $add->status = $request->status;

        $add->save();

        return redirect()->route('advertizement.index')->with('success', 'Add added successfully');
    }

    public function delete(Request $request)
    {
        $add = Advertizement::where('id', $request->id)->firstOrFail();

        removeImage($add->image);

        $add->delete();

        return 'success';
    }
}
