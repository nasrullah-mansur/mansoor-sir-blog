<?php

namespace App\Http\Controllers;

use App\Models\Sidebar;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function store(Request $request)
    {
        $sidebar = new Sidebar();
        $sidebar->category = $request->category;
        $sidebar->tags = $request->tags;
        $sidebar->newsletter = $request->newsletter;
        $sidebar->mini_course = $request->mini_course;
        $sidebar->mini_course_title = $request->mini_course_title;
        $sidebar->mini_course_link = $request->mini_course_link;
        $sidebar->comment = $request->comment;
        $sidebar->advertizement = $request->advertizement;

        $sidebar->save();
    }

    public function update(Request $request, $id)
    {
        $sidebar = Sidebar::where('id', $id)->firstOrFail();

        $sidebar->category = $request->category;
        $sidebar->tags = $request->tags;
        $sidebar->newsletter = $request->newsletter;
        $sidebar->mini_course = $request->mini_course;
        $sidebar->comment = $request->comment;
        $sidebar->advertizement = $request->advertizement;
        $sidebar->mini_course_title = $request->mini_course_title;
        $sidebar->mini_course_link = $request->mini_course_link;

        $sidebar->save();
    }


}
