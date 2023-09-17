<?php

namespace App\Http\Controllers\Back;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\BlogCategoryDataTable;
use App\Models\Blog;

class BlogCategoryController extends Controller
{
    public function index(BlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('back.blog_category.index');
    }

    public function create()
    {
        return view('back.blog_category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blog_categories',
        ]);

        $category = new BlogCategory();
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);

        $category->save();

        return redirect()->route('blog.category.index')->with('success', 'New category added successfully');
    }

    public function edit($id)
    {
        $category = BlogCategory::where('id', $id)->firstOrFail();
        return view('back.blog_category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:blog_categories',
        ]);

        $category = BlogCategory::where('id', $id)->firstOrFail();
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);

        $category->save();

        return redirect()->route('blog.category.index')->with('success', 'Category updated successfully');
    }

    public function delete(Request $request)
    {
        $category = BlogCategory::where('id', $request->id)->firstOrFail();

        $blog = Blog::where('blog_category_id', $category->id)->first();

        if ($blog) {
            return [
                'type' => 'error',
                'text' => 'Please remove blog items first that under this category then try again'
            ];
        }


        $category->delete();
    }
}
