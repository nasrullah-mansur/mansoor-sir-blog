<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Specialties;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\DataTables\CourseDataTable;

class CourseController extends Controller
{
    public function index(CourseDataTable $dataTable)
    {
        return $dataTable->render('back.course.index');
    }

    public function create()
    {
        $categories = Specialties::all();
        return view('back.course.create', compact('categories'));
    }

    function store(Request $request)
    {
        $request->validate([
            'specialty_id' => 'required',
            'image' => 'required|mimes:png,jpg',
            'title' => 'required',
            'description' => 'required',
            'btn_text' => 'required',
            'btn_link' => 'required',
            'status' => 'required',
        ]);

        $course = new Course();
        $course->specialty_id = $request->specialty_id;
        $course->title = $request->title;
        $course->slug = Str::slug($request->title);
        $course->description = $request->description;
        $course->btn_text = $request->btn_text;
        $course->btn_link = $request->btn_link;
        $course->status = $request->status;
        $course->image = ImageUpload($request->image, COURSE_PATH);

        $course->save();

        return redirect()->route('course.index')->with('success', 'Course Item Added Successfully');
    }

    function edit($id)
    {
        $course = Course::where('id', $id)->firstOrFail();
        $categories = Specialties::all();

        return view('back.course.edit', compact('course', 'categories'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'specialty_id' => 'required',
            'image' => 'nullable|mimes:png,jpg',
            'title' => 'required',
            'description' => 'required',
            'btn_text' => 'required',
            'btn_link' => 'required',
            'status' => 'required',
        ]);

        $course = Course::where('id', $id)->firstOrFail();
        $course->specialty_id = $request->specialty_id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->btn_text = $request->btn_text;
        $course->slug = Str::slug($request->title);
        $course->btn_link = $request->btn_link;
        $course->status = $request->status;
        if ($request->hasFile('image')) {
            $course->image = ImageUpload($request->image, COURSE_PATH, $course->image);
        }

        $course->save();

        return redirect()->route('course.index')->with('success', 'Course Item updated Successfully');
    }

    public function delete(Request $request)
    {
        $course = Course::where('id', $request->id)->firstOrFail();

        removeImage($course->image);

        $course->delete();
    }

    // ================= Front =====================;
    public function front_course_by_category($slug)
    {
        $specialty = Specialties::where('slug', $slug)->firstOrFail();
        $courses = Course::where('specialty_id', $specialty->id)
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        $categories = Specialties::with('courses')->get();

        $title = $specialty->title;

        return view('front.course.index', compact('courses', 'title', 'categories'));
    }
}
