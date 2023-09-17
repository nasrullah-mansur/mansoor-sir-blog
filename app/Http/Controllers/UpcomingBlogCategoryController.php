<?php

namespace App\Http\Controllers;

use App\Models\Sidebar;
use Illuminate\Support\Str;
use App\Models\UpcomingBlog;
use Illuminate\Http\Request;
use App\Models\UpcomingBlogCategory;
use App\DataTables\UpcomingBlogCategoryDataTable;

class UpcomingBlogCategoryController extends Controller
{
    public function index(UpcomingBlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('back.blog_category_upcoming.index');
    }

    public function create()
    {
        return view('back.blog_category_upcoming.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|unique:blog_categories',
        ]);

        $category = new UpcomingBlogCategory();
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);

        $category->save();

        $sidebar = new Sidebar();
        $sidebar->category = $request->category;
        $sidebar->comment = $request->comment;
        $sidebar->mini_course = $request->mini_course;
        $sidebar->mini_course_title = $request->mini_course_title;
        $sidebar->mini_course_link = $request->mini_course_link;
        $sidebar->advertizement = $request->advertizement;
        $sidebar->advertizement_id = $request->advertizement_id;

        $sidebar->page_id = "category_" . $category->id;
        $sidebar->save();

        return redirect()->route('up.blog.category.index')->with('success', 'New category added successfully');
    }

    public function edit($id)
    {
        $category = UpcomingBlogCategory::where('id', $id)->firstOrFail();
        return view('back.blog_category_upcoming.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:blog_categories',
        ]);

        $category = UpcomingBlogCategory::where('id', $id)->firstOrFail();
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);

        $category->save();

        $sidebar = Sidebar::where("page_id", "category_" . $category->id)->firstOrFail();
        // $sidebar = new Sidebar();
        $sidebar->category = $request->category;
        $sidebar->comment = $request->comment;
        $sidebar->mini_course = $request->mini_course;
        $sidebar->mini_course_title = $request->mini_course_title;
        $sidebar->mini_course_link = $request->mini_course_link;
        $sidebar->advertizement = $request->advertizement;
        $sidebar->advertizement_id = $request->advertizement_id;

        $sidebar->page_id = "category_" . $category->id;
        $sidebar->save();

        return redirect()->route('up.blog.category.index')->with('success', 'Category updated successfully');
    }

    public function delete(Request $request)
    {
        $category = UpcomingBlogCategory::where('id', $request->id)->firstOrFail();

        $blog = UpcomingBlog::where('blog_category_id', $category->id)->first();

        if ($blog) {
            return [
                'type' => 'error',
                'text' => 'Please remove blog items first that under this category then try again'
            ];
        }


        $category->delete();
    }
}
