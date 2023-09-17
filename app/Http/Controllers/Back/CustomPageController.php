<?php

namespace App\Http\Controllers\Back;

use App\Models\Sidebar;
use App\Models\CustomPage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CustomPageDataTable;
use App\Models\CommentCustom;

class CustomPageController extends Controller
{
    public function index(CustomPageDataTable $dataTable)
    {
        return $dataTable->render('back.custom_page.index');
    }

    public function create()
    {
        return view('back.custom_page.create');
    }


    public function store(Request $request)
    {
        // return $request;

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'html' => 'required',
            'image' => 'nullable|mimes:png,jpg'
        ]);

        $page = new CustomPage();
        $page->name = $request->name;
        $page->title = $request->title;
        if($request->hasFile('image')) {
            $page->image = ImageUpload($request->image, CUSTOM_PAGE_BANNER);
        }
        $page->slug = Str::slug($page->title);
        $page->html = $request->html;
        $page->css = $request->css;
        $page->javascript = $request->javascript;

        $page->save();

        $sidebar = new Sidebar();
        $sidebar->category = $request->category;
        $sidebar->comment = $request->comment;
        $sidebar->mini_course = $request->mini_course;
        $sidebar->mini_course_title = $request->mini_course_title;
        $sidebar->mini_course_link = $request->mini_course_link;
        $sidebar->advertizement = $request->advertizement;
        $sidebar->advertizement_id = $request->advertizement_id;

        $sidebar->page_id = "page_" . $page->id;
        $sidebar->save();

        return redirect()->route('custom.page.index')->with('success', 'Custom page added successfully');
    }


    public function edit($id)
    {
        $page = CustomPage::where('id', $id)->firstOrFail();
        return view('back.custom_page.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'html' => 'required',
            'image' => 'nullable|mimes:png,jpg'
        ]);

        $page = CustomPage::where('id', $id)->firstOrFail();
        
        $page->name = $request->name;
        $page->title = $request->title;
        $page->slug = Str::slug($page->title);
        $page->html = $request->html;
        $page->css = $request->css;
        $page->javascript = $request->javascript;
        if($request->hasFile('image')) {
            $page->image = ImageUpload($request->image, CUSTOM_PAGE_BANNER, $page->image);
        }

        $page->save();

        $sidebar = Sidebar::where('page_id', "page_" . $page->id)->firstOrFail();
        
        $sidebar->category = $request->category;
        $sidebar->comment = $request->comment;
        $sidebar->mini_course = $request->mini_course;
        $sidebar->mini_course_title = $request->mini_course_title;
        $sidebar->mini_course_link = $request->mini_course_link;
        $sidebar->advertizement = $request->advertizement;
        $sidebar->advertizement_id = $request->advertizement_id;

        $sidebar->page_id = "page_" . $page->id;
        $sidebar->save();

        return redirect()->route('custom.page.index')->with('success', 'Custom page updated successfully');
    }

    public function delete(Request $request)
    {
        $page = CustomPage::where('id', $request->id)->firstOrFail();
        removeImage($page->image);
        $sidebar = Sidebar::where('page_id', "page_" . $page->id)->firstOrFail();
        $sidebar->delete();


        $comment = CommentCustom::where('blog_id', $page->id)->get();

        foreach ($comment as $value) {
            $value->delete();
        }

        $page->delete();
    }
}
