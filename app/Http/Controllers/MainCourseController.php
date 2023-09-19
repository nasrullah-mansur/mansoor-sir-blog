<?php

namespace App\Http\Controllers;

use App\Models\MainCourse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MainCourseBlogCategory;
use App\DataTables\MainCourseDataTable;
use App\Models\MainCourseBlog;

class MainCourseController extends Controller
{
    function index (MainCourseDataTable $dataTable) {
        // return MainCourse::all();
        return $dataTable->render('back.main_course.index');
    }

    function create () {
        $categories = MainCourseBlogCategory::all();
        return view('back.main_course.create', compact('categories'));
    }

    function store (Request $request) {
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg',
            'mini_course_link' => 'required',
            'blog_link' => 'required',
            'complementary_link' => 'required',
            'status' => 'required'
        ]);

        $course = new MainCourse();
        $course->title = $request->title;
        $course->slug = Str::slug($course->title);
        $course->image = ImageUpload($request->image, MAIN_COURSE_PATH);
        $course->mini_course_link = $request->mini_course_link;
        $course->blog_link = $request->blog_link;
        $course->complementary_link = $request->complementary_link;
        $course->social_proof_link = $request->social_proof_link;
        $course->buy_now_link = $request->buy_now_link;
        $course->status = $request->status;
        $course->save();

        return redirect()->route('main.course.index')->with('success', 'Main course successfully added');
    }

    function edit ($id) {
        $categories = MainCourseBlogCategory::all();
        $course = MainCourse::where('id', $id)->firstOrFail();
        return view('back.main_course.edit', compact('categories', 'course'));
    }

    function update (Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:png,jpg',
            'mini_course_link' => 'required',
            'blog_link' => 'required',
            'complementary_link' => 'required',
            'status' => 'required'
        ]);

        $course = MainCourse::where('id', $id)->firstOrFail();
        $course->title = $request->title;
        $course->slug = Str::slug($course->title);
        if($request->hasFile('image')) {
            $course->image = ImageUpload($request->image, MAIN_COURSE_PATH, $course->image);
        }
        $course->mini_course_link = $request->mini_course_link;
        $course->blog_link = $request->blog_link;
        $course->complementary_link = $request->complementary_link;
        $course->social_proof_link = $request->social_proof_link;
        $course->buy_now_link = $request->buy_now_link;
        $course->status = $request->status;
        $course->save();

        return redirect()->route('main.course.index')->with('success', 'Main course successfully updated');
    }

    function delete (Request $request) {
        $course = MainCourse::where('id', $request->id)->firstOrFail();

        $blogs = MainCourseBlog::where('main_course_id', $request->id)->get();
        foreach($blogs as $blog) {
            removeImage($blog->image);
            $blog->delete();
        }

        removeImage($course->image);
        $course->delete();
    }

    

    // ======================== Front ===============================
    function front_courses() {
        $courses = MainCourse::where('status', STATUS_ACTIVE)->orderBy('created_at', 'DESC')->paginate(12);
        return view('front.main_course.index', compact('courses'));
    }

    function front_main_course_blog_by_category ($course_slug, $category_slug) {
        $course = MainCourse::where('slug', $course_slug)->firstOrFail();
        $courses = MainCourse::all();
        $category = MainCourseBlogCategory::where('slug', $category_slug)->firstOrFail();
        $categories = MainCourseBlogCategory::with(['blogs' => function($query) use ($course) {
            $query->where('main_course_id', $course->id);
        }])->get();
        $blogs = MainCourseBlog::with('category')
        ->where('main_course_id', $course->id)
        ->where('main_course_blog_category_id', $category->id)
        ->orderBy('created_at', 'DESC')
        ->paginate(12);

        return view('front.main_course.blog', compact(
            'course',
            'courses', 
            'category', 
            'blogs', 
            'categories'
        ));
    }


    function front_single_blog($course_slug, $blog_slug) {
        $blog = MainCourseBlog::where('slug', $blog_slug)->firstOrFail();
        $course = MainCourse::where('slug', $course_slug)->firstOrFail();
        $categories = MainCourseBlogCategory::with(['blogs' => function($query) use ($course) {
            $query->where('main_course_id', $course->id);
        }])->get();
        $courses = MainCourse::all();

        $comments = [];


        $previous_id = MainCourseBlog::where('id', '<', $blog->id)
        ->where('main_course_id', $course->id)
        ->max('id');
        $next_id = MainCourseBlog::where('id', '>', $blog->id)
        ->where('main_course_id', $course->id)
        ->min('id');

        $previous_blog = MainCourseBlog::where('id', $previous_id)->first(['title', 'slug']);
        $next_blog = MainCourseBlog::where('id', $next_id)->first(['title', 'slug']);

        $other_blogs = MainCourseBlog::where('slug', '!=', $blog_slug)
        ->where('main_course_id', $course->id)
        ->inRandomOrder()
        ->take(3)->get();

        return view('front.main_course.single', compact(
            'blog', 
            'course', 
            'categories', 
            'previous_blog', 
            'next_blog', 
            'other_blogs',
            'comments',
            'courses'
        ));

    }
}
