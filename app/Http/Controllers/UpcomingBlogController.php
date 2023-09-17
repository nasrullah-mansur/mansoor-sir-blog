<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\UpcomingBlog;
use Illuminate\Http\Request;
use App\DataTables\UpcomingBlogDataTable;
use App\Models\CommentUpcoming;
use App\Models\Sidebar;
use App\Models\UpcomingBlogCategory;

class UpcomingBlogController extends Controller
{
    public function index(UpcomingBlogDataTable $dataTable)
    {
        // return UpcomingBlog::with('category')->get();
        return $dataTable->render('back.blog_upcoming.index');
    }

    public function create()
    {
        $categories = UpcomingBlogCategory::all();
        return view('back.blog_upcoming.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg',
            'content' => 'required',
            'details' => 'required',
            'status' => 'required',
            'blog_category_id' => 'required'
        ], [
            'blog_category_id.required' => 'The blog category field is required.'
        ]);

        $blog = new UpcomingBlog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->image = ImageUpload($request->image, BLOG_PATH);
        $blog->thumbnail = 'image thumbnail';
        $blog->content = $request->content;
        $blog->details = $request->details;
        $blog->custom_css = $request->custom_css;
        $blog->custom_js = $request->custom_js;
        $blog->blog_category_id = $request->blog_category_id;
        $blog->status = $request->status;
        $blog->button_text = $request->button_text;

        $blog->save();

        $sidebar = new Sidebar();
        $sidebar->category = $request->category;
        $sidebar->comment = $request->comment;
        $sidebar->mini_course = $request->mini_course;
        $sidebar->mini_course_title = $request->mini_course_title;
        $sidebar->mini_course_link = $request->mini_course_link;
        $sidebar->advertizement = $request->advertizement;
        $sidebar->advertizement_id = $request->advertizement_id;

        $sidebar->page_id = "up_" . $blog->id;
        $sidebar->save();


        return redirect()->route('up.blog.index')->with('success', 'Blog added successfully');
    }

    public function edit($id)
    {
        $blog = UpcomingBlog::where('id', $id)->firstOrFail();
        $categories = UpcomingBlogCategory::all();
        
        return view('back.blog_upcoming.edit', compact('categories', 'blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:png,jpg',
            'content' => 'required',
            'details' => 'required',
            'status' => 'required',
            'blog_category_id' => 'required'
        ], [
            'blog_category_id.required' => 'The blog category field is required.'
        ]);

        $blog = UpcomingBlog::where('id', $id)->firstOrFail();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $blog->image = ImageUpload($request->image, BLOG_PATH);
            $blog->thumbnail = 'image thumbnail';
        }

        $blog->content = $request->content;
        $blog->details = $request->details;
        $blog->blog_category_id = $request->blog_category_id;
        $blog->status = $request->status;
        $blog->custom_css = $request->custom_css;
        $blog->custom_js = $request->custom_js;
        $blog->button_text = $request->button_text;

        $blog->save();

        $sidebar = Sidebar::where('page_id', "up_" . $blog->id)->firstOrFail();
        // $sidebar = new Sidebar();
        $sidebar->category = $request->category;
        $sidebar->comment = $request->comment;
        $sidebar->mini_course = $request->mini_course;
        $sidebar->mini_course_title = $request->mini_course_title;
        $sidebar->mini_course_link = $request->mini_course_link;
        $sidebar->advertizement = $request->advertizement;
        $sidebar->advertizement_id = $request->advertizement_id;

        $sidebar->page_id = "up_" . $blog->id;
        $sidebar->save();


        return redirect()->route('up.blog.index')->with('success', 'Blog updated successfully');
    }

    public function delete(Request $request)
    {
        $blog = UpcomingBlog::where('id', $request->id)->firstOrFail();
        removeImage($blog->image);

        $sidebar = Sidebar::where('page_id', "up_" . $blog->id)->firstOrFail();
        $sidebar->delete();
        $blog->delete();

        $comment = CommentUpcoming::where('blog_id', $blog->id)->get();

        foreach ($comment as $value) {
            $value->delete();
        }

        return redirect()->route('up.blog.index')->with('success', 'Blog removed successfully');
    }
}
