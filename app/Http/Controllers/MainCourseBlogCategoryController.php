<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MainCourseBlogCategory;
use App\DataTables\MainCourseBlogCategoryDataTable;
use App\Models\MainCourseBlog;

class MainCourseBlogCategoryController extends Controller
{
    function index(MainCourseBlogCategoryDataTable $dataTable) {
        return $dataTable->render('back.main_course_blog_category.index');
    }

    function create() {
        return view('back.main_course_blog_category.create');
    }

    function store(Request $request) {
        $request->validate([
            'title' => 'required|unique:main_course_blog_categories',
        ]);

        $category = new MainCourseBlogCategory();
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);

        $category->save();

        return redirect()->route('main.course.blog.category.index')->with('success', 'Main course blog category added');
    }

    function edit($id) {
        $category = MainCourseBlogCategory::where('id', $id)->firstOrFail();
        return view('back.main_course_blog_category.edit', compact('category'));
    }

    function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|unique:main_course_blog_categories',
        ]);

        $category = MainCourseBlogCategory::where('id', $id)->firstOrFail();
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);

        $category->save();

        return redirect()->route('main.course.blog.category.index')->with('success', 'Main course blog category updated');
    }

    function delete(Request $request) {
        $category = MainCourseBlogCategory::where('id', $request->id)->firstOrFail();
        $blogs = MainCourseBlog::where('main_course_blog_category_id', $request->id)->get();
        foreach($blogs as $blog) {
            removeImage($blog->image);
            $blog->delete();
        }
        $category->delete();
    }
}
