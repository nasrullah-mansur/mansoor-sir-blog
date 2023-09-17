<?php

namespace App\Http\Controllers;

use App\DataTables\MainCourseBlogDataTable;
use App\Models\MainCourse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MainCourseBlog;
use App\Models\MainCourseBlogCategory;

class MainCourseBlogController extends Controller
{
    function index(MainCourseBlogDataTable $dataTable) {
        return $dataTable->render('back.main_course_blog.index');
    }

    function create () {
        $courses = MainCourse::all();
        $categories = MainCourseBlogCategory::all();
        return view('back.main_course_blog.create', compact('categories', 'courses'));
    }

    function store (Request $request) {
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg',
            'content' => 'required',
            'details' => 'required',
            'status' => 'required',
            'main_course_id' => 'required',
            'main_course_blog_category_id' => 'required'
        ], [
            'main_course_id.required' => 'The course field is required.',
            'main_course_blog_category_id.required' => 'The blog category field is required.'
        ]);

        $blog = new MainCourseBlog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->image = ImageUpload($request->image, BLOG_PATH);
        $blog->thumbnail = 'image thumbnail';
        $blog->content = $request->content;
        $blog->details = $request->details;
        $blog->custom_css = $request->custom_css;
        $blog->custom_js = $request->custom_js;
        $blog->main_course_id = $request->main_course_id;
        $blog->main_course_blog_category_id = $request->main_course_blog_category_id;
        $blog->status = $request->status;
        $blog->button_text = $request->button_text;

        $blog->save();

        return redirect()->route('main.course.blog.index')->with('success', 'Blog added successfully');
    }

    function edit ($id) {
        $blog = MainCourseBlog::where('id', $id)->firstOrFail();
        $courses = MainCourse::all();
        $categories = MainCourseBlogCategory::all();
        return view('back.main_course_blog.edit', compact('blog', 'courses', 'categories'));
    }

    function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:png,jpg',
            'content' => 'required',
            'details' => 'required',
            'status' => 'required',
            'main_course_id' => 'required',
            'main_course_blog_category_id' => 'required'
        ], [
            'main_course_id.required' => 'The course field is required.',
            'main_course_blog_category_id.required' => 'The blog category field is required.'
        ]);

        $blog = MainCourseBlog::where('id', $id)->firstOrFail();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        if($request->hasFile('image')) {
            $blog->image = ImageUpload($request->image, BLOG_PATH, $blog->image);
        }
        $blog->thumbnail = 'image thumbnail';
        $blog->content = $request->content;
        $blog->details = $request->details;
        $blog->custom_css = $request->custom_css;
        $blog->custom_js = $request->custom_js;
        $blog->main_course_id = $request->main_course_id;
        $blog->main_course_blog_category_id = $request->main_course_blog_category_id;
        $blog->status = $request->status;
        $blog->button_text = $request->button_text;

        $blog->save();

        return redirect()->route('main.course.blog.index')->with('success', 'Blog updated successfully');
    }

    function delete (Request $request) {
        $blog = MainCourseBlog::where('id', $request->id)->firstOrFail();
        removeImage($blog->image);
        $blog->delete();
    }
}
