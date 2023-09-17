<?php

namespace App\Http\Controllers\Back;

use App\Models\BlogTag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\BlogTagDataTable;
use App\Http\Controllers\Controller;

class BlogTagController extends Controller
{
    public function index(BlogTagDataTable $dataTable)
    {
        return $dataTable->render('back.blog_tag.index');
    }

    public function create()
    {
        return view('back.blog_tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blog_tags',
        ]);

        $tag = new BlogTag();
        $tag->title = $request->title;
        $tag->slug = Str::slug($request->title);

        $tag->save();

        return redirect()->route('blog.tag.index')->with('success', 'New tag added successfully');
    }

    public function edit($id)
    {
        $tag = BlogTag::where('id', $id)->firstOrFail();
        return view('back.blog_tag.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:blog_categories',
        ]);

        $tag = BlogTag::where('id', $id)->firstOrFail();
        $tag->title = $request->title;
        $tag->slug = Str::slug($request->title);

        $tag->save();

        return redirect()->route('blog.tag.index')->with('success', 'Tag updated successfully');
    }

    public function delete(Request $request)
    {
        $tag = BlogTag::where('id', $request->id)->firstOrFail();

        $tag->delete();
    }
}
